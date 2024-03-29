<?php
// source: C:\xampp2\htdocs\ibbCreativeLibraryVol2\app\presenters/templates/Admin/default.latte

use Latte\Runtime as LR;

class Template67b87e5c24 extends Latte\Runtime\Template
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
		$this->parentName = "../@layoutAdmin.latte";
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Dashboard</a>
          </li>
        </ol>
<!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Celkový počet formátů: <strong> <?php echo LR\Filters::escapeHtmlText($numberOfFormats) /* line 17 */ ?></strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Admin:formats")) ?>">
                <span class="float-left">Přejít na formáty</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Aktuální verze Creative Lib: <strong> <?php echo LR\Filters::escapeHtmlText($clVersions->newBranchVersion) /* line 33 */ ?></strong> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Admin:cl")) ?>">
                <span class="float-left">Přejít na verze</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          </div>
        </div>
<?php
	}

}
