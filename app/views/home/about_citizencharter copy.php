<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Populate City Dropdown Based on Country Selected</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select.country").change(function() {
                var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxstatic";
                var selectedCountry = $(".country option:selected").val();
                alert(selectedCountry);
                $.ajax({
                    type: "POST",
                    url: baseurl,
                    data: {
                        country: selectedCountry
                    }
                }).done(function(data) {
                    $("#response").html(data);
                });
            });
            $(".subchild").change(function() {
                var selectedCountry = $("this").val();
                alert(selectedCountry);
            });

        });
    </script>
</head>

<body>
    <form>
        <table>
            <tr>
                <td>
                    <label>Country:</label>
                    <select class="country">
                        <option>Select</option>
                        <option id="drivinglicence" value="drivinglicence">Driving Licence</option>
                        <option id="conductorlicence" value="conductorlicence">Conductors
                            Licence-Fresh</option>
                        <option id="registervehicles" value="registervehicles">Registration of
                            Motor Vehicles</option>
                        <option id="permitcon-permit" value="permitcon-permit">Permit-Contract
                            Carriage Permit</option>
                        <option id="permitgood-permit" value="permitgood-permit">Permit-Goods Carriage
                            Permit</option>
                        <option id="permitstage-permit" value="permitstage-permit">Permit-Stage Carriage
                            Permit</option>
                        <option id="permitprivate-permit" value="7">Permit-Private
                            Service Vehicle Permit</option>
                        <option id="permiteducat-permit" value="8">Permit-Educational
                            Institution Bus Permit</option>
                        <option id="permitev-permit" value="9">Permit-E.V Permit</option>
                        <option id="permittemp-permit" value="10">Permit-Temporary
                            Permit</option>
                        <option id="permitsur-permit" value="11">Permit-Surrender of
                            Permit</option>
                    </select>
                </td>
                <td id="response">
                    <!--Response will be inserted here-->
                </td>
            </tr>
        </table>
    </form>
</body>

</html>