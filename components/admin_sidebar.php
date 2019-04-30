<div class="row">
    <div class="col-sm-4">
        <div class="list-group">
            <a href="/school/administration/displayAdminForm" class="list-group-item active">
                Administrators
                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            </a>
            <?php
            
             for ($i = 0; $i < count($this->data['adminList']); $i++) {
	?>
            <article class="list-group-item">
                <div class="clearfix image">


                    <a href="/school/administration/show/<?php echo $this->data['adminList'][$i]['id']; ?>">
                        <img src="/school/uploads/<?php echo $this->data['adminList'][$i]['adminImage']; ?>" alt="..." class="pull-left">
                    </a>
                    <p class="name">
                        <?php echo $this->data['adminList'][$i]['adminName']; ?>
                    </p>
                    <p class="role">
                        <?php echo $this->data['adminList'][$i]['adminRole']; ?>
                    </p>
                    <p class="phone">
                        <?php echo $this->data['adminList'][$i]['adminPhone']; ?>
                    </p>
                    <p class="email">
                        <?php echo $this->data['adminList'][$i]['adminEmail']; ?>
                    </p>

                </div>
            </article>

            <?php }?>




        </div>


    </div>



    <div class="col-sm-8">