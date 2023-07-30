<form id="form-auth" method="post" action="javascript:void(0);">
    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Имя</div>
        <div class="col-sm-9">
            <input type="text" placeholder="Имя" name="name" value="<?=$userArray["name"]?>" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Фамилия</div>
        <div class="col-sm-9">
            <input type="text" placeholder="Фамилия" name="lastName" value="<?=$userArray["lastname"]?>" class="form-control">
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-lg dark p-x-lg">Сохранить</button>
    <br>
    <div class="otvet"></div>

</form>