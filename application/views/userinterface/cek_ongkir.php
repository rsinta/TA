
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .box {
            background-color: skyblue;
            margin: 0 auto;
            padding-bottom: 20px;
            padding-top: 20px;
            text-align : center;
        }
        .box-child {
            display: inline-table;
            
        }
        .box-form {
            color : black;
            padding: 0.5rem;
            margin: 0.5rem;
        }

        .box-form input, select {
            display: block;
            width: 400px;
            height: 30px;
            color : black;
        }
      
        td{
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            max-width: 80px;
            min-width: 80px;
        }
    </style>

</head>
<body>
<div class="box">
    <div class="box-child">
        <fieldset>
               <label>Alamat</label>
               <textarea readonly style="width: 95%;height: 80px;"><?php echo $_SESSION['userdata']->alamat?>
               </textarea>

            <div class="box-form">
                <label>Kurir
                    <select name="courier" id="courier">
                        <option value="">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS</option>
                    </select>
                </label>
            </div>
            <div class="box-form">
                <button type="button" value="Submit" onclick="get_cost('501','<?php echo $_SESSION['userdata']->kota?>',courier.value);" style="width : 400px">SUBMIT</button>
            </div>
            <div>
            <h1 style="text-align: center;">BIAYA</h1>
            <table class="table table-bordered table-striped">
            <thead>
            <tr style="text-align: center;">
                <th>Service</th>
                <th>Description</th>
                <th>Biaya</th>
                <th>Estimasi</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="detail">
                
            </tbody>
            </table>
            </div>
        </fieldset>
    </div>
 </div>

        

<script type="text/javascript">

    function get_cost(city_origin, city_destination, courier) {

        console.log(city_origin);
        console.log(city_destination);
        console.log(courier);
        var weight =  parseInt($('#totalberattransaksi').val());
        console.log(weight);
        if(city_destination != '' && weight != '' && courier != '') {
            console.log('here');
           $.ajax({
        url  :"<?php echo base_url('apiongkir/cost');?>",
        type : 'POST',
        data : {
            city_origin : city_origin,
            city_destination : city_destination ,
            weight : weight ,
            courier : courier
        },
         success : function(data)
        {
           var cost = $.parseJSON(data);   
                    if(cost['rajaongkir']['results'][0]['costs'].length > 0) {
						$("#detail").empty();
                        $.each(cost['rajaongkir']['results'][0]['costs'], function(key, value) {
                            var first =  value.service.split(" ");
                            var services = "";
                            for (var i = 0  ; i< first.length ; i++)
                            {
                                services=services+first[i]+"#";
                            }
                            services= services.substring(0,(services.length-1));
                            $("#detail").append(
                                "<tr>" +
                               "<td>" + value.service + "</td>" +
                                "<td>" + value.description + "</td>" +
                                "<td>" + value.cost[0]['value'] + "</td>" +
                                "<td>" + value.cost[0]['etd'] + "</td>" +
                                "<td><button style='padding: 6px 3px;' class='btn btn-danger' data-dismiss=modal onclick=pilihongkir('"+value.cost[0]['value']+"','"+courier+"','"+services+"')>Konfirm</button></td>"+
                                "</tr>"
                            );
                        });
                    }
                
           
        }
        })
        }
    }
function pilihongkir(pilih,kurir,services) {
    if(kurir=="jne"){kurir="JASA001"; kurirname="JNE";}
    if(kurir=="tiki"){kurir="JASA002"; kurirname="TIKI";}
    if(kurir=="pos"){kurir="JASA003"; kurirname="POS";}
    var service = services.split("#");
    var services = "";
    for (var i = 0  ; i< service.length ; i++)
    {
        services=services+service[i]+" ";
    }
    var total=0;
    services= services.substring(0,(services.length-1));
    $('#ongkirnya').empty();
    $('#ongkirnya').empty();
    $('#ongkirjml').empty();
    $('#totaltransaksiview').empty();
    $('#jasakirim').html('Jasa Pengiriman : '+kurirname+' '+services);
    $('#ongkirnya').html(accounting.formatMoney(pilih, "Rp ", 2, ".", ","));
    $('#ongkirjml').val(pilih);
    total = parseInt($('#totaltransaksi').val());
    pilih = parseInt(pilih);
    total = total+pilih ;
    $('#totaltransaksiview').html(accounting.formatMoney(total, "Rp ", 2, ".", ","));
    $('#totaltransaksi').val(total);
    $('#idjasakirim').val(kurir);
}
</script>
</body>
</html>