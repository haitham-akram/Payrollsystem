<html>
<head>
    <title>upayrollmanagementsystem.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    @if ( $details['method'] == 'Cheque')
    <a href="{{ $details['pdf_link'] }}">Click Here To Download The Cheque.</a>
    @endif
    <p>Thank you for Hard working!</p>
    <p>Keep it up!</p>
</body>
</html>
