<?php

require_once __DIR__ . '/../../app/Inversores/UserManager.php';

$userManager = new UserManager();

$users = $userManager->getAllEmpresarios();

foreach ($users as $user) {
    ?>
    <div class="card d-flex justify-content-center text-center" style="padding: 0.5rem;">
        <div class="row no-gutters">
            <div class="card-body">
                <h5 class="card-title"><?= $user["username"] ?></h5>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <dl>
                    <dt>
                        Nombre.
                    </dt>
                    <dd>
                        <?= $user["name"] ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>
                        Email.
                    </dt>
                    <dd>
                        <?= $user["email"] ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>
                        Usuario desde.
                    </dt>
                    <dd>
                        <?= $user['created_at'] ?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <?php
}
?>