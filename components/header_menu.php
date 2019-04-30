<?php
$logged = session::logged();

if (!$logged) {?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/school">
                    <img src="/school/images/scudo.png" alt="logo">
                </a>
            </div>

    </nav>
    <!--end of nav -->

    <!--BREADCRUMB -->
    <div id="message">
        <?php
} else {

	?>
            <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/school/">
                            <img src="/school/images/scudo.png" alt="logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/school">School
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <?php if ($this->data['logged']['role'] == "sale") {?>
                            <li>
                                <a href="/school/administration"></a>
                            </li>
                            <?php } else {?>
                            <li>
                                <a href="/school/administration">Administration</a>
                            </li>
                            <?php }?>

                            <li role="separator" class="divider"></li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">
                                    <?php echo $this->data['logged']['name'] . '</br>' ?>
                                    <?php echo $this->data['logged']['role'] ?>
                                </a>
                            </li>
                            <li>
                                <a href="/school/logout">Logout</a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/school/uploads/<?php echo $this->data['logged']['image'] ?>" alt="..." class="pull-left">
                                </a>

                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            </nav>
            <!--end of nav -->

            <!--BREADCRUMB -->
            <div id="message">

                <?php
}
?>