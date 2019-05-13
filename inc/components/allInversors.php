<?php

require_once __DIR__ . '/../../app/Inversores/InversorManager.php';

$inversorManager = new InversorManager();

$inversors = $inversorManager->getAllInversors();
//$botonesDeshabilitados = is_null(auth_user()) ? 'disabled title="Solo puedes invertir si estás logeado"' : 'title="Invertir"';

foreach ($inversors as $inversor) {
    ?>
    <div class="card d-flex justify-content-center text-center" style="padding: 0.5rem;">
        <div class="row no-gutters">
            <div class="card-body">
                <h5 class="card-title"><?= $inversor["username"] ?></h5>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <dl>
                    <dt>
                        Nombre.
                    </dt>
                    <dd>
                        <?= $inversor["name"] ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>
                        Email.
                    </dt>
                    <dd>
                        <?= $inversor["email"] ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>
                        Usuario desde.
                    </dt>
                    <dd>
                        <?= $inversor['created_at'] ?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <?php
}
?>