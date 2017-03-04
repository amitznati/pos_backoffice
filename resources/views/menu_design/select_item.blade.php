<div class="container"><h1>בחר פריט</h1></div>
<div id="exTab1" >	
	<ul  class="nav nav-pills">
		<li class="active"><a  href="#1a" data-toggle="tab">מוצרים</a>
		</li>
		<li><a href="#2a" data-toggle="tab">טפריטים</a>
		</li>
	</ul>

		<div class="tab-content clearfix">
		  <div class="tab-pane active" id="1a">
      			<h3>מוצרים</h3>
      			@include('menu_design.product_select_table')
			</div>
			<div class="tab-pane" id="2a">
      			<h3>טפריטים</h3>
      			@include('menu_design.menu_select_table')
			</div>
</div>