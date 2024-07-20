<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
</head>

<body>
    @component('components.province', [
        'provinces' => $provinces,
        'label' => 'Quận',
        'name' => 'province',
        'defaultValue' => '',
        'defautValueDisplay' => 'Chọn tỉnh/ Thành phố',
    ])
    @endcomponent
</body>

</html>
