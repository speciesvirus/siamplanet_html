<div style="background: url({{ asset('resources/assets/images/bg-hr-top.png') }}) no-repeat top center; padding-top: 25px; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td width="580" align="center" style="padding-top:20px">
                <table height="40" width="580" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td width="580" align="left" style="padding:30px 30px 20px 30px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                   style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td align="left" valign="bottom" style="padding:0 0 35px 0">
                                        <table width="520">
                                            <tbody>
                                            <tr>
                                                <td style="font-size:32px;line-height:36px;padding:0 0 0 0;
                                                font-weight:bold;color:#444444;max-width:300px;overflow:hidden;text-overflow:ellipsis">
                                                    Welcome to Nainam, <span style="color:#fcd700">get started...</span>
                                                </td>
                                                <td valign="top">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" valign="top" height="50">
                                                                <a href="{{ route('home') }}">
                                                                    <img width="110" height="50" border="0"
                                                                         src="{{ asset('resources/assets/images/nainam_logo_top_blue_300.png') }}"
                                                                         style="text-decoration:none;display:block;outline:none">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td width="580" align="center">
                <table width="580" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td width="580" align="center" style="padding-bottom:50px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td width="580" align="center"
                                        style="padding:0 30px 0 30px;background-color:#ffffff">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                               style="border-collapse:collapse">
                                            <tbody>
                                            <tr>
                                                <td align="left" valign="bottom"
                                                    style="padding:0 0 40px 0;font-size:22px;line-height:30px;color:#444444">
                                                    Please confirm your email address to click the button below.
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="580" align="center" style="padding:0 30px 0 30px;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                               style="border-collapse:collapse">
                                            <tbody>
                                            <tr>
                                                <td align="center" style="padding:0 35px 0 35px">
                                                    <a href="{{ route('user.activated') }}/{{ $email }}/{{ $token }}"
                                                       style="text-decoration:none;display:block" target="_blank">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td align="center"
                                                                    style="padding:14px 20px 14px 20px;background-color:#003561;border-radius:4px">
                                                                    <a href="{{ route('user.activated') }}/{{ $email }}/{{ $token }}"
                                                                       style="font-weight:bold;font-size:18px;line-height:22px;color:#ffffff;text-decoration:none;display:block;text-align:center;max-width:400px;overflow:hidden;text-overflow:ellipsis"
                                                                       target="_blank">
                                                                        Confirm your email
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td align="center">
                <table width="580" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td align="center" style="padding:0 30px 15px 30px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                   style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td align="left" valign="bottom"
                                        style="font-family:helvetica neue,helvetica,arial,sans-serif;font-size:24px;line-height:28px;font-weight:bold;color:#a7a7a7">
                                        Thanks for signing up.
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr style="color: #737373;">
                        <td align="center" style="padding:0 30px 30px 30px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                   style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0"
                                               style="border-collapse:collapse">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-family:helvetica neue,helvetica,arial,sans-serif;font-size:12px;line-height:22px;">
                                                    <span style="color:#444444;" title="Unsubscribe from this email">&copy; Copyright nainam.</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0"
                                               style="border-collapse:collapse">
                                            <tbody>
                                            <tr>
                                                <td align="left">
                                                    <a href="https://m.me/nainamofficial/"
                                                       style="color:#444444;font-size:12px;line-height:22px;text-decoration: inherit;"
                                                       title="Find answers in our Help Center" target="_blank">
                                                        Help Center
                                                    </a>
                                                </td>
                                                <td align="left"
                                                    style="padding-bottom: 5px;">
                                                    <span style="color:#444444;font-size: 11px;padding: 4px;"
                                                          title="Unsubscribe from this email">|</span>
                                                </td>
                                                <td align="left">
                                                    <a href="{{ route('policies.privacy') }}"
                                                       style="color:#444444;font-size:12px;line-height:22px;text-decoration: inherit;"
                                                       title="Find answers in our Help Center" target="_blank">
                                                        Privacy Policy
                                                    </a>
                                                </td>
                                                <td align="left"
                                                    style="padding-bottom: 5px;">
                                                    <span style="color:#444444;font-size: 11px;padding: 4px;"
                                                          title="Unsubscribe from this email">|</span>
                                                </td>
                                                <td align="left">
                                                    <a href="{{ route('policies.terms') }}"
                                                       style="color:#444444;font-size:12px;line-height:22px;text-decoration: inherit;"
                                                       title="Find answers in our Help Center" target="_blank">
                                                        Terms &amp; Conditions
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

</div>

