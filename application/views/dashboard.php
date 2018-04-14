<style>
#chart{
    z-index:10;} 
</style>
<body>

    <div>
        <div class="row">
            <div class="col-lg-12">
            </br>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="POST">
                            <div class="form-group">
                                <label>TAHUN</label>

                                <select class="form-control" id="tahun" name="tahun">
                                    <?php
                                    $mulai= date('Y') - 5;
                                    for($i = $mulai;$i<$mulai + 20 ;$i++){
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <br>
                                <button  onclick="tampil_dashboard()" id="tampil_dashboard" class="btn btn-primary">Tampilkan</button>
                            </div>  
                        </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div> --><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" >

                <div id="chart">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php echo json_encode($grafik); ?>
    <?php echo json_encode($grafik1); ?> -->
</body>


