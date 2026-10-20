<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f5ef">
    <meta name="description" content="เรียนรู้การสร้าง UI components ที่ใช้งานได้จริงด้วย Laravel Livewire และ Alpine.js">
    <title>Blade Component Cookbook — พื้นที่ฝึกทำ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    {{ $slot }}
    @livewireScripts
</body>
</html>
