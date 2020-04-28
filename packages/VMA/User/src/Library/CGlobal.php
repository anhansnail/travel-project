<?php
/**
 * Created by JetBrains PhpStorm.
 * User: QuynhTM
 */

namespace Longtt\B2s\Library;


class CGlobal
{
    static $css_ver = 1.1;
    static $js_ver = 1.2;
    public static $POS_HEAD = 1;
    public static $POS_END = 2;
    public static $extraHeaderCSS = '';
    public static $extraHeaderJS = '';
    public static $extraFooterCSS = '';
    public static $extraFooterJS = '';

    public static $message_validation = [
        'required' => 'Vui lòng nhập :attribute .',
        'email'    => ':attribute phải có định dạng email',
        'max'    => 'Vui lòng nhập trường :attribute với số ký tự lớn nhất là :max',
        'min'    => ':attribute phải có ít nhất :min kí tự, vui lòng nhập lại.',
        'unique' => ':attribute đã tồn tại trong hệ thống',
        'confirmed' => 'Mật khẩu xác nhận không trùng khớp',
        'regex' => 'Số điện thoại phải gồm các chữ số',
    ];

    public static $order_status = [
        'da_dat_hang'=>'Đã đặt hàng',
        'don_hang_moi' => 'Đơn hàng mới',
        'huy_don_hang' => 'Huỷ đơn hàng',
        'don_hang_dang_xu_li' => 'Đang xử lí',
        'don_hang_dang_van_chuyen' => 'Đang vận chuyển',
        'hoan_thanh_don_hang' => 'Hoàn thành'
    ];

    public static $user_pending_transaction = [
        'moi' => 'Mới',
        'cho_giao_dich' => 'Chờ giao dịch',
        'hoan_thanh' => 'Hoàn thành giao dịch',
        'huy' => 'Huỷ'
    ];

    public static $user_transaction = [
        'moi' => 'Mới',
        'cho_giao_dich' => 'Chờ giao dịch',
        'hoan_thanh' => 'Hoàn thành giao dịch',
        'huy' => 'Huỷ'
    ];

    public static $transaction_type = [
        NAP_TIEN => 'Nạp tiền',
        RUT_TIEN => 'Rút tiền',
        CHUYEN_TIEN => 'Chuyển tiền'
    ];

}
