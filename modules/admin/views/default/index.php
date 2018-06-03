<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    <div class="col-sm-6">
    <h4>ผู้ใช้งานระบบ</h4>
    <ul>
        <li><a href="/resource/res-users">ผู้ใช้งานระบบ</a></li>
        <li><a href="/resource/res-group">กลุ่มผู้ใช้งานระบบ</a>
            <small class="help help-block">กลุ่มผู้ใช้ตามฝังองค์กรของบริษัท</small></li>
    </ul>
    
    <h4>สิทธิ์การใช้ระบบ</h4>
    <ul>
        <li><a href="/rbac/role">Role</a>
            <small class="help help-block">กลุ่มผู้ใช้ระบบ เช่น Purchase Manager,Admin</small></li>
        <li><a href="/rbac/permission">Permission</a>
            <small class="help help-block">สิทธิ์การใช้ระบบ เช่น po/create</small></li>
        <li><a href="/rbac/assignment">Assignment</a>
            <small class="help help-block">เงื่อนไขผู้ใชักับกลุ่มผู้ใช้</small></li>
        <li><a href="/rbac/rule">Rule</a></li>
    </ul>
    <h4>Logs</h4>
    <ul>
        <li><a href="/admin/app-userlog">User log</a></li>
        <li><a href="/admin/app-model-log">Model log</a></li>
    </ul>
    </div>
    <div clsas="col-sm-6">
    <h4>ข้อมูลมาสเตอร์ที่อยู่</h4>
    <ul>
       
        <li>
            <a href="/resource/res-province">จังหวัด</a>
        </li>
        <li>
            <a href="/resource/res-district">อำเภอ/เขต</a>
        </li>
        <li>
            <a href="/resource/res-subdistrict"> ตำบล/แขวง </a>
        </li>
    </ul>
    <h4>Settings</h4>
    <ul>
        <li><a href="/resource/res-doc-sequence">Document Sequence Generator</a>
            <small class="help help-block">จัดการระบบการรันเลขที่เอกสาร</small></li>

        <li>
        <a href="/resource/res-peple"> ลำดับผู้จองคิวทำบัตร </a>
        <small class="help help-block"> รายชื่อผู้ลงทะเบียนทำบัตรประชาชน </small></li>
    </ul>
    </div>
</div>
