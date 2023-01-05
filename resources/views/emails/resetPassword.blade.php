@extends('emails.app')

<div class="content">
    <td align="left">
        <table border="0" width="80%" align="center" cellpadding="0" cellspacing="0" class="container590">
            <tr>
                <td align="left" style="color: #888888; width:20px; font-size: 16px; line-height: 24px;">
                    <!-- section text ======-->

                    <p style="line-height: 24px; margin-bottom:15px;">
                        Hello!
                    </p>

                    <p style="line-height: 24px; margin-bottom:20px;">
                        Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.Code chỉ có hiệu lực trong 30 phút.
                    </p>

                    <table border="0" align="center" width="180" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="margin-bottom:20px;     background: #cfe2ef; border-radius: 5px;width:30%">

                        <tr>
                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                        </tr>

                        <tr>
                            <td align="center" style="color: #cfe2ef; font-size: 14px; line-height: 22px;letter-spacing: 1px;font-weight: bold;">
                                <!-- main section button -->
                                <p align="center" style="color: #1a1818; font-size: 30px;font-weight: bold;">
                                    <b style="color: black; text-decoration: none;">
                                        {{$code}}
                                    </b>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                        </tr>

                    </table>

                    <p style="line-height: 24px; margin-bottom:20px;">
                        Nếu bạn không yêu cầu đặt lại mật khẩu, bạn không cần thực hiện thêm hành động nào.
                    </p>
                    <p style="line-height: 24px">
                        Regards,</br>
                        @yield('title', 'Football-News')
                    </p>

                    <br />

                    @include('emails.footer')
                </td>
            </tr>
        </table>
    </td>
</div>

