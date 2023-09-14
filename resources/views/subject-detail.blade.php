<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Subject Detail</title>
</head>
<body class="bg-white">
    <!--ADD CONTENT HERE-->
    
    @include('components.teacheravatardisplay')
    @include('components.subjectdetailscards')
    @include('components.subjectdetailsdisplaystudents')
    
    


</body>
<style>
    #content {
  flex: 1; /* Allow the content to take up the remaining width */
  overflow-y: auto; /* Allow content to be scrollable if it overflows vertically */
  /* Add any other styling you need for the content on the right side */
}
</style>
</html>




