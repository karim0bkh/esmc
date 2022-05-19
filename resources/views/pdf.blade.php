

<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>application_{{$application->applied}}_{{$application->name}}</title>
    <meta name="author" content="ASUS"/>
    <style type="text/css"> * {margin:0; padding:0; text-indent:0; }
        .s1 { color: #F00; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 36pt; }
        .s2 { color: #0D0D0D; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 24pt; }
        h1 { color: #0D0D0D; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 24pt; }
        p { color: #0D0D0D; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 18pt; margin:0pt; }
    </style>
</head>
<body>


<p class="s1" style="padding-left: 60pt;text-indent: 0pt;line-height: 41pt;text-align: center;">Application</p>
<p class="s2" style="padding-top: 16pt;padding-left: 60pt;text-indent: 0pt;text-align: center;"> {{$application->name}} </p>
<h1 style="padding-top: 14pt;padding-left: 60pt;text-indent: 0pt;text-align: center;">For : {{$application->applied}}</h1>
<p style="padding-top: 14pt;padding-left: 20pt;text-indent: 0pt;line-height: 161%;text-align: left;">Name : {{$application->name}} </p><br>
<p style="padding-left: 20pt;">   Email : {{$application->email}}</p><br>
<p style="padding-left: 20pt;">    Address : {{$application->address}} </p><br>
<p style="padding-left: 20pt;">  City : {{$application->city}} </p><br>
<p style="padding-left: 20pt;">    Birthdate : {{$application->bdate}}</p><br>
<p style="padding-left: 20pt;">   Phone : {{$application->phone}}</p><br>
<p style="padding-left: 20pt;">   Status : {{$application->status}}</p><br>
<p style="padding-left: 20pt;">    Created at : {{$application->created_at}}</p><br>
<p style="padding-left: 20pt;text-indent: 0pt;line-height: 21pt;text-align: left;">Academic experience : </p><br>
<p style="padding-top: 13pt;padding-left: 20pt;text-indent: 0pt;line-height: 161%;text-align: left;">{{$application->acd}}</p><br>
<p style="padding-left: 20pt;text-indent: 0pt;line-height: 21pt;text-align: left;"> Professional experience : </p> <br>
<p style="padding-top: 13pt;padding-left: 20pt;text-indent: 0pt;line-height: 161%;text-align: left;">{{$application->pro}}</p><br>
<br><br>
<p style="padding-left: 30pt">
    status : 1 : <span style="color: green">accepted</span> , -1 : <span style="color: red">rejected</span>
</p>
</body></html>
