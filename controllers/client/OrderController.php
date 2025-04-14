<?php
require_once '../models/ship.php';
require_once '../models/cart.php';
require_once '../models/user.php';
require_once '../models/order.php';

class OrderController
{
    protected $cart;
    protected $ship;
    protected $user;
    protected $order;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->order = new Order();
    }

    public function index()
    {
        $user = $this->user->getUserById($_SESSION["user"]['user_id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();
        // echo "<pre>";
        // print_r($ships);
        // echo "</pre>";
        include "../views/client/checkout/checkout.php";
    }

    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitCheckout"])) {
            $carts = $this->cart->getAllCart();
            $coupon_id = '';
            isset($_POST['coupon_id']) ? $coupon_id = $_POST['coupon_id'] : $coupon_id = '5';

            $errors = [];

            if (empty($_POST['name'])) {
                $errors['name'] = "Vui lòng nhập tên";
            }

            if (empty($_POST['email'])) {
                $errors['email'] = "Vui lòng nhập email hợp lệ";
            }

            if (empty($_POST['phone'])) {
                $errors['phone'] = "Vui lòng nhập phone hợp lệ";
            }

            if (empty($_POST['address'])) {
                $errors['address'] = "Vui lòng nhập email hợp lệ";
            }

            if (empty($_POST['note'])) {
                $errors['note'] = "Nhập ghi chú";
            }

            if (!isset($_POST['payment_method'])) {
                $errors['payment_method'] = "Vui lòng chọn cách thanh toán";
            }
            if (!isset($_POST['shiping_id'])) {
                $errors['shiping_id'] = "Vui lòng chọn phương thức vận chuyển";
            }

            if (empty($errors)) {
                $orderDetail = $this->order->addOrderDetail(
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['phone'],
                    $_POST['address'],
                    $_POST['amount'],
                    $_POST['note'],
                    $_POST['payment_method'],
                    $coupon_id,
                    $_POST['shiping_id']
                );
                if ($orderDetail) {
                    $orderDetail_id = $this->order->getOrderDetailIDNew();
                    foreach ($carts as $cart) {
                        $this->order->addOder($cart['product_id'], $cart['variant_id'], $orderDetail_id['order_detail_id'], $cart["quantity"]);
                        $this->cart->deleteCart($cart['cart_id']);
                    }
                    unset($_SESSION['total']);
                    unset($_SESSION['coupon']);
                    unset($_SESSION['totalCoupon']);
                    $_SESSION['success'] = "Đặt hàng thành công";
                    header("Location: ?act=checkout");
                    exit;
                } else {
                    $_SESSION['error'] = "Đặt hàng thất bại";
                    header("Location: ?act=checkout");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Vui lòng nhập đủ các trường";
                header('location:?act=checkout');
                exit;
            }
        }
    }

    public function listOrderUser()
    {
        $listOrder = $this->order->getOrderDetailByIdUser();
        // echo '<pre>';
        // var_dump($listOrder);
        // echo '</pre>';

        include "../views/client/profile/listOrderUser.php";
    }

    public function trackOrder()
    {
        $getOrderDetail = $this->order->getOrderDetailById();
        $getOrder = $this->order->getOrderById();
        $getCoupon = $this->order->getCouponById();
        $getShip = $this->order->getShipById();
        $handleCoupon = $this->handleCoupon($getCoupon, $getOrderDetail['amount']);

        // echo '<pre>';
        // var_dump($getOrderDetail);
        // echo '</pre>';
        include "../views/client/trackOrder/trackOrder.php";
    }

    public function handleCoupon($coupon, $total)
    {
        if ($coupon['coupon_type'] == 'percentage') {
            $totalCoupon = ($total * ($coupon['coupon_value'] / 100));
        } elseif ($coupon['coupon_type'] == 'fixed amount') {
            $totalCoupon = $coupon['coupon_value'];
        }

        return $totalCoupon ?? 0;
    }

    public function cancleOrder()
    {
        try {
            $this->order->cancle();
            $_SESSION['success'] = 'Hủy đơn hàng thành công';
            header('Location: ?act=list-user-order');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Hủy đơn hàng thất bại';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
