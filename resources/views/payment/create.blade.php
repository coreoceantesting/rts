<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <title>Payment Form</title>
</head>
<body>
    <form name="ecom" method="post" action="https://test.sbiepay.sbi/secure/AggregatorHostedListener">
        <!--@csrf-->
        <input type="text" name="EncryptTrans" value="{{ $EncryptTrans }}">
        <!--<input type="text" name="merchIdVal" value="1000112">-->
        <input type="text" name="merchIdVal" value="1000605">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
