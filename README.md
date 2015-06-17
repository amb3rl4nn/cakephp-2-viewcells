# cakephp-2-viewcells
View Cells for CakePHP 2


### INSTALLATION ###
1) Copy files to APP/Plugin folder

2) Make sure you have Plugins loading
app/config/bootstrap
      CakePlugin::loadAll();
  or  CakePlugin::load('ViewCells');

3) Attach Cell Helper to your controller such as:
  var $helpers = ['ViewCells.Cell'];

4) Test your installation from any view file:
  <?=$this->Cell->element('ViewCells.Test')?>


### IMPLEMENTATION ###
ViewCells are simple controllers that give access to Models
to make an easier method to render "Elements" that are unique
to themselves and don't fit into the current code convention.

This plugin simply allows you to create a Cell object that
extends the View class and utilizes the built in element
rendering code to output the template but structure the code
in such a way that makes sense where to find its controller.

  
### USING ###
This plugin uses the same standards as CakePHP so you can create 
subfolders/plugins in the Cell directory structure without issue.

EXAMPLE:
  Cell Code: <?=$this->Cell->element('[name]')?>
  Cell Controller: /app/Controller/Cell/[name]Cell.php
  Cell View: /app/View/Cells/[name].ctp
  
EXAMPLE 2:
  Cell Code: <?=$this->Cell->element('[path]/[name]')?>
  Cell Controller: /app/Controller/Cell/[path]/[name]Cell.php
  Cell View: /app/View/Cells/[path]/[name].ctp
  
OTHER SAMPLES:
  <?=$this->Cell->element('[plugin].[name]')?>
  <?=$this->Cell->element('[plugin].[path]/[name]')?>


Issues? https://github.com/amb3rl4nn/cakephp-2-viewcells/issues
Want to Help? https://github.com/amb3rl4nn/cakephp-2-viewcells
