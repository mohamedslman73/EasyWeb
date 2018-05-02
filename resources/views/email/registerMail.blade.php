<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<style>

    body {font-style: oblique;font-size: 11px;line-height: 1.5;}

    h1 {font-family: 'lucida bright' ;}
    #background{
        background-image: url('{{url('/backend/website/pic/mail/Artboard.png')}}');
    }
    @media (max-width: 300px) {
        body {font-size: 9px;}
        table {margin:10px;padding: 10px}
    }


</style>

<!-- email container -->
<table width="100%;" cellspacing="0" cellpadding="0" border="1" style="font-family: 'lucida bright';font-size: 12px;max-width: 550px">
    <tr>
        <td>
            <!-- head -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="color: #FFF;" style="padding-top:0;padding-bottom:0;">
                <tr>
                    <th colspan="2" id="background" style="background-color:#012232 ;background-size: cover;background-position: center;background-repeat: no-repeat;">
                        <h1 style="font-style: 'Monotype Corsiva' ;">Welcome {{$name}} ,</h1>
                        <img src="{{url('/backend/website/pic/mail/Artboard-4.png')}}" width="120px">
                        <p>We are Thrilled to have you on board</p>
                        <button style="border: none;background: none;color: #FFF;margin-bottom: 10px;cursor: pointer">LOGIN</button>
                    </th>
                </tr>
            </table>


            <!-- know us more -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr style="text-align: center;font-style: normal">
                    <td valign="top" width="100%"><h2>KNOW US MORE</h2></td>
                </tr>
            </table>

            <!-- website -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 0 20px;">
                <tr>
                    <td><img src="{{url('/backend/website/pic/mail/Artboard-6.png')}}" style="width: 90px;display: block;margin: 0;padding: 0;"></td>
                    <td valign="top" width="100%">

                        <ul style="padding-left: 30px;">
                            <li style="list-style: none;"><h4 style="font-style: normal;">Website</h4></li>
                            <li>Search +1000 Schools in Egypt</li>
                            <li>Compare between them</li>
                            <li>Add them to your favourite list and we will inform you when any updates happen</li>
                            <li>Add new school, update or edit school information</li>
                        </ul>
                    </td>
                </tr>
            </table>

            <hr style="width: 70%;color: #D1DADF;">

            <!-- mobile application -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 20px 20px 0 20px;">
                <tr>
                    <td><img src="{{url('/backend/website/pic/mail/Artboard-7.png')}}" style="width: 90px;display: block;margin: 0;padding: 0;"></td>
                    <td valign="top" width="100%" style="padding: 20px;text-align: center;">
                        <h4 style="text-align: left;font-style: normal;">Mobile Application</h4>
                        <p style="text-align: left;">Tired of using desktop computer, you can find the same features on our mobile application. you can download it through links, just click on those icons.</p>
                        <a href="https://itunes.apple.com/gb/app/easyschools/id1344484011?mt=8&ign-mpt=uo%3D2"><img src="{{url('/backend/website/pic/mail/Artboard-9.png')}}" style="width:30px;margin: 0;padding: 0;"></a>
                        <a href="https://play.google.com/store/apps/details?id=com.easyschool.easyschoolwebsite"><img src="{{url('/backend/website/pic/mail/Artboard-8.png')}}" style="width:30px;margin: 0;padding: 0;"></a>
                    </td>

                </tr>
            </table>

            <hr style="width: 70%;color: #D1DADF;">

            <!-- school management system -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 0 20px;">
                <tr>
                    <td><img src="{{url('/backend/website/pic/mail/Artboard-10.png')}}" style="width: 90px;display: block;margin: 0;padding: 0;"></td>
                    <td valign="top" width="100%" style="padding: 20px;">
                        <h4 style="font-style: normal;">School Managment System</h4>
                        <p>Monitor students performance in school through our website and mobile application. if you need more information please e-mail us on <a href="#" style="color:#111;">conact@easyschools.org</a></P>
                    </td>
                </tr>
            </table>

            <!-- footer -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#134260" style="padding: 0 20px;">
                <tr>
                    <td><img src="{{url('/backend/website/pic/mail/Artboard-12.png')}}" style="width: 120px;display: block;margin: 0;padding: 0;"></td>
                    <td valign="top" width="100%" style="display: block;color: #FFF;padding: 0 20px;">
                        <p>We are happy to solve any problems you face , please do not hesitate to contact at </p>
                        <a href="#" style="color:#FFF;text-decoration:none;">conact@easyschools.org</a>
                    </td>
                    <td valign="top" width="100%" style="display: block;text-align: right;font-size: 9px;color: #FFF;">
                        <p>Terms, Privacy</p>
                        <p>3 El Andalus street, Heliopolis, Cairo, Egypt</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
