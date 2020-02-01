<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaFeedbackPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createPermission('feedback/atc/view');
        $this->createPermission('feedback/pilot/view');
        $this->createPermission('feedback/group/view');
        $this->createPermission('feedback/atcmentor/view');
        $this->createPermission('feedback/eve/view');
        $this->createPermission('feedback/live/view');
        $this->createPermission('feedback/submitter');
        $this->createPermission('feedback/action');

        $this->deletePermission("adm/mship/feedback");
        $this->deletePermission("adm/mship/feedback/list");
        $this->deletePermission("adm/mship/feedback/list/atc");
        $this->deletePermission("adm/mship/feedback/list/pilot");
        $this->deletePermission("adm/mship/feedback/view/*");
        $this->deletePermission("adm/mship/feedback/configure/*");
        $this->deletePermission('adm/mship/feedback/view/*/action');
        $this->deletePermission("adm/mship/feedback/view/*/unaction");
        $this->deletePermission("adm/mship/feedback/view/*/reporter");
        $this->deletePermission("adm/mship/feedback/list/*");
        $this->deletePermission("adm/mship/feedback/list/group");
        $this->deletePermission("adm/mship/feedback/view/group");
        $this->deletePermission("adm/mship/account/*/feedback");
        $this->deletePermission("adm/mship/feedback/list/atcmentor");
        $this->deletePermission("adm/mship/feedback/configure/atcmentor");
        $this->deletePermission("adm/mship/feedback/list/*");
        $this->deletePermission("adm/mship/feedback/list/*/export");
        $this->deletePermission("adm/mship/account/*/feedback");
        $this->deletePermission("adm/mship/feedback/new");
        $this->deletePermission("adm/mship/feedback/toggle");
        $this->deletePermission("adm/mship/feedback/configure/eve/*");
        $this->deletePermission("adm/mship/feedback/configure/liv/*");
        $this->deletePermission("adm/mship/feedback/new");
        $this->deletePermission("adm/mship/feedback/view/*/send");
        $this->deletePermission("adm/mship/feedback/view/atc/send");
        $this->deletePermission("adm/mship/feedback/view/atcmentor/send");
        $this->deletePermission("adm/mship/feedback/view/own/");
    }

    private function createPermission(string $name, $guard = 'web')
    {
        return \Spatie\Permission\Models\Permission::create([
            'name' => $name,
            'guard_name' => $guard
        ]);
    }

    private function deletePermission(string $name)
    {
        $permission = \Spatie\Permission\Models\Permission::findByName($name);
        return \Spatie\Permission\Models\Permission::destroy($permission->id);
    }
}
