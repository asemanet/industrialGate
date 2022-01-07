

<?=$message?>

    <script language="javascript" type="text/javascript">
    function RedirctToIPG(RefId) {
        var form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", "https://asan.shaparak.ir/");
        form.setAttribute("target", "_blank");
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("name", "RefId");
        hiddenField.setAttribute("value", RefId);
        form.appendChild(hiddenField);
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }
</script>

