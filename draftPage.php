<div class="row-fluid" id="draftPage">

    <?php foreach($drafts as $key => $value){ ?>

        <div class="panel panel-primary">

            <div class="panel-heading">
                <b><?php echo $value["draft_title"]; ?></b>
            </div>

            <div class="panel-body">
                <b><?php echo substr($value["draft"], 0, 350); ?></b>
            </div>

        </div>

    <?php }?>

</div>