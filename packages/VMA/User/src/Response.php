<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2/7/17
 * Time: 3:08 PM
 */
namespace VMA\User;

class Response{
    // MÃ LỖI CHUNG
    public static $success=array(
        'code'=>'200',
        'status'=>'success',
        'message'=>'thành công',
        'data'=>[],
    );
    public static $error=array(
        'code'=>'400',
        'status'=>'error',
        'message'=>'lỗi',
        'data'=>[],
    );

    public static $error_login=array(
        'code'=>'E001',
        'status'=>'error',
        'message'=>'lỗi',
        'data'=>[],
    );
    public static $error_login_data=array(
        'code'=>'E001',
        'status'=>'error',
        'message'=>'lỗi',
    );

    public static $error_token=array(
        'code'=>'E002',
        'status'=>'error',
        'message'=>'Token không hợp lệ',
        'data'=>[],
    );


    public static function response($response){
        header('Content-Type: application/json');
        echo json_encode($response);exit;
    }
    public static $error_array=array(
        "code"=>"",
        "status"=>"error",
        "message"=>"Hệ thống đang bảo trì bạn vui lòng thử lại sau ít phút. Hoặc liên hệ nhân viên chăm sóc khách hàng để được hỗ trợ",
        //"data"=>[],
    );
    // MÃ THÀNH CÔNG CHUNG
    public static $success_array=array(
        "code"=>"",
        "status"=>"success",
        "message"=>"Thành công",
        //          "data"=>[],
        );
    // LỖI PHIÊN LÀM VIỆC HẾT HẠN
    public static $unauthorize=array(
        "code"=>"E001",
        "status"=>"error",
        "message"=>"Phiên làm việc của bạn đã hết hạn. Đăng nhập lại để tiếp tục sử dụng",
        //"data"=>[],
    );

    // LỖI PHIÊN BẢN CẦN CẬP NHẬT
    public static $force_update=array(
        "code"=>"E003",
        "status"=>"error",
        "message"=>"Bạn cần cập nhật phiên bản mới !",
        //"data"=>[],
    );
    /*
    * Mã Lỗi Mới
    * */

    // response lỗi Login V2
    public static $phone_or_pin_error=array(
        "code"=>"EL001",
        "status"=>"error",
        "message"=>"Số điện thoại hoặc mật khẩu không đúng",

    );

    public static $phone_formatted_error=array(
        "code"=>"EL005",
        "status"=>"error",
        "message"=>"Số điện thoại không đúng định dạng hoặc đã tồn tại trong hệ thống",

    );
    public static $confirm_pin_error=array(
        "code"=>"EL006",
        "status"=>"error",
        "message"=>"Xác nhận mật khẩu không đúng",

    );

    public static $expire_token=array(
        "code"=>"EL008",
        "status"=>"error",
        "message"=>"Token hết hạn(Authentication)",

    );
    public static $token_error=array(
        "code"=>"EL009",
        "status"=>"error",
        "message"=>"Token không hợp lệ",

    );

}