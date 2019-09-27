<?php
include('db_conn.php');

if(isset($_POST['datepicker'])) {
    $datepicker = $_POST['datepicker'];
    $datepicker1 = $_POST['datepicker1'];
    function countWorkDay($datepicker,$datepicker1){
        var sDay = new Date(Date.parse($datepicker.replace(/-/g, "/")));
        var eDay = new Date(Date.parse($datepicker1.replace(/-/g, "/")));
        var s_t_w = sDay.getDay(), e_t_w = eDay.getDay();
        // 总相差天数
        var diffDay = (eDay - sDay) / (1000 * 60 * 60 * 24) + 1;
        if(parseInt(diffDay) == 0)
            return parseInt(diffDay);
        // 周末天数
        var weekEnds = 0; 
        for(var i = 0; i < diffDay; i++) 
        { 
            if(sDay.getDay() == 0 || sDay.getDay() == 6) 
                weekEnds ++; 
            sDay = sDay.valueOf(); 
            sDay += 1000 * 60 * 60 * 24; 
            sDay = new Date(sDay); 
        } 
        return parseInt(diffDay - weekEnds);
    }

    header('Location: ./relate.html');
}



?>