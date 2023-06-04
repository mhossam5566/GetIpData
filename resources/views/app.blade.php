<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ip Information</title>

  <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" />
</head>
<body>

@yield('content')

<script>
window.addEventListener('load', function() {
var element = document.getElementById('loader-page');
element.style.display = 'none';
@if (isset($error))
Swal.fire(
'error',
'{{$error}}',
'error'
)
@endif

});
</script>

<script src="https://www.bing.com/api/maps/mapcontrol?callback=loadMap" async defer></script>
<script>

function showLoader() {
var button = document.getElementById('lookupBtn');

button.disabled = true;
button.innerHTML = 'Loading...';
document.getElementById('search').submit();

// هنا يمكنك تنفيذ الإجراء المطلوب، مثلاً إرسال طلب للخادم

// بعد الانتهاء، يمكنك إزالة علامة التحميل
/*
      وتفعيل الزر مرة أخرى
      button.disabled = false;
      button.innerHTML = 'LookUp';
      loader.style.display = 'none';
      */
}


function loadMap() {
var map = new Microsoft.Maps.Map('#map',
{
credentials: 'AppdvMobXNzntPPCXqG6iSNJ-zPfKOeE25cxSPlDOCN2T-dmWleIW0VNKBU-GO4_'
});
@if (isset($data))
var latitude = "{{$data->latitude}}";
var longitude = "{{$data->longitude}}";
@endif
var center = new Microsoft.Maps.Location(latitude, longitude);

var pin = new Microsoft.Maps.Pushpin(center);
map.entities.push(pin);
}
</script>


</body>
</html>