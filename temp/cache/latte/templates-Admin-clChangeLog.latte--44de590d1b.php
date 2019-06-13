<?php
// source: C:\xampp2\htdocs\ibbCreativeLibraryVol2\app\presenters/templates/Admin/clChangeLog.latte

use Latte\Runtime as LR;

class Template44de590d1b extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['clChangeLog'])) trigger_error('Variable $clChangeLog overwritten in foreach on line 28');
		$this->parentName = "../@layoutAdmin.latte";
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Changelog</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Datum</th>
                    <th>Typ</th>
                    <th>Popis</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Datum</th>
                   <th>Typ</th>
                   <th>Popis</th>
                   <th></th>
                  </tr>
                </tfoot>
                <tbody>
<?php
		$iterations = 0;
		foreach ($clChangeLogs as $clChangeLog) {
?>
                  <tr>
                    <td><?php echo LR\Filters::escapeHtmlText($clChangeLog->date) /* line 30 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($clChangeLog->type) /* line 31 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($clChangeLog->notes) /* line 32 */ ?></td>
                    <td><a class="btn btn-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Admin:formatEdit", [$clChangeLog->id])) ?>">Upravit záznam</a></td>
                  </tr>
<?php
			$iterations++;
		}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div><?php
	}

}