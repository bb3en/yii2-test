<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\widgets\layouts\LeftNavBarItem;
use app\widgets\layouts\TopNavBarItem;
//use app\assets\AppAsset;
//AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body id="page-top">
    <?php $this->beginBody() ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lanmor Yii<sup>2</sup></div>
            </a>

            <?php echo LeftNavBarItem::widget([
                //'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['divider' => 'sidebar-divider my-0'],
                    ['label' => 'Home', 'url' => '/site/index', 'iconClass' => 'fas fa-home'],
                    ['heading' => 'manager'],
                    !Yii::$app->user->getIsGuest() ?
                        [
                            'label' => 'Admin',
                            'iconClass' => 'fas fa-fw fa-cog',
                            'items' => [
                                ['label' => 'User', 'url' => '/admin/user'],
                                ['header' => 'RBAC Manager'],
                                ['label' => 'Permission', 'url' => '/admin/permission'],
                                ['label' => 'Role', 'url' => '/admin/role'],
                                ['label' => 'Role-Child', 'url' => '/admin/role-child'],
                                ['label' => 'Assignment', 'url' => '/admin/assignment'],
                            ],
                        ] : '',
                    !Yii::$app->user->getIsGuest() ? ['label' => 'API', 'url' => '/api/manager', 'iconClass' => 'fas fa-laugh-wink'] : '',
                    Yii::$app->user->getIsGuest() ? ['label' => 'Sign Up', 'url' => '/site/signup', 'iconClass' => 'fas fa-caret-square-up'] : '',
                    ['divider' => 'sidebar-divider my-0'],
                    ['heading' => 'Main'],
                    ['label' => 'Posts', 'url' => '/post', 'iconClass' => 'fas fa-cheese'],
                    ['label' => 'Google', 'url' => '/google', 'iconClass' => 'fas fa-cheese'],
                    ['divider' => 'sidebar-divider my-0'],
                ],
            ]);
            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->

                    <?php echo TopNavBarItem::widget([
                        'items' => [
                            ['divider' => 'topbar-divider d-none d-sm-block'],
                            Yii::$app->user->getIsGuest() ? 
                            ['label' => 'Login', 'showText' => 'true', 'url' => '/site/login'] : '',
                            // [
                            //     'label' => 'Alert',
                            //     'showText' => 'true',
                            //     'iconClass' => '',
                            //     'items' =>
                            //     ['header' => 'Alerts Center'],
                            //     ['meg' => '1234'],
                            //     ['footer' => 'Show All Alerts']
                            // ],
                            !Yii::$app->user->getIsGuest() ? 
                            [
                                'label' => 'identity-user',
                                'showText' => 'true',
                                'iconClass' => '',
                                'items' => [
                                    ['label' => 'Profile', 'url' => '#', 'iconClass' => 'fas fa-user fa-sm fa-fw mr-2 text-gray-400'],
                                    ['divider' => 'dropdown-divider'],
                                    ['identity' => 'logout'],
                                ]
                            ] : '',
                        ],
                    ]);
                    ?>

                    <!-- End of Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <?= $content ?>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AdGeek IT Lanmor 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>