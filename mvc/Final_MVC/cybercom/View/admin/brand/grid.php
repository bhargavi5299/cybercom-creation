<?php $brands = $this->getBrands();?>
<div class="shadow-lg p-0 mb-2 bg-white rounded">
	<form id="brand" method="post">
	<div class="container">
		<div class="h2 text-center pt-3" >
			<p>Brand Details</p>
		</div>
	<div style="float:right;">
		<button type="button" class="btn btn-primary" name="update" onclick="setUpdate(this); object.setForm('#brand').load();">Update</button>&nbsp;&nbsp;
		<button type="button" class="btn btn-danger" name="delete" onclick="setDelete(this); object.setForm('#brand').load();" >Delete</button>
	</div>
	<br><br>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Id</th>
				<th scope="col">image</th>
				<th scope="col">Name</th>
				<th scope="col">Sort Order</th>
				<th scope="col" class="text-center">Status</th>
				<th scope="col">Remove</th>
				</tr>
			</thead>
			<tbody>
			<?php if ($brands): ?>
				<?php foreach ($brands->getData() as $key => $result): ?>
					<tr>
						<th scope='row'><?php echo $result->brandId; ?></th>
						<?php $image = 'Images/Brand/' . $result->brandImage;?>
						<td><img src = '<?php echo $image ?>' height='80px' width='100px'></img></td>

						<input type='hidden' value='<?php echo $result->brandId; ?>' name='label[brand][<?php echo $key; ?>][brandId]'>
						<input type='hidden' value='<?php echo $result->createdDate; ?>'>
						<td><input type='text' class="form-control" placeholder="Enter Brand Name" value='<?php echo $result->brandName; ?>' name='label[brand][<?php echo $key; ?>][brandName]'></td>
						<td><input type='text' class="form-control" placeholder="Enter Sort Order" value='<?php echo $result->sortOrder; ?>' name='label[brand][<?php echo $key; ?>][sortOrder]'></td>
						
						<td><?php echo $result->status; ?></td>
						
						<td align="center"><input type = 'checkbox' name='remove[<?php echo $result->brandId; ?>]'></td>
					</tr>
				<?php endforeach?>
				<?php else: ?>
					<tr><td colspan='8' align='center'><b>No Record For Brand</b></td></tr>
				<?php endif?>
			</tbody>
		</table>
		<div class="form-row ">
			<div class="form-group mt-3 col-md-6">
				<input type="file"  class="form-control file" id="brand" name="media" />
					<!-- <input type="button" class="button" value="Upload" > -->
			</div>
			<button type="button" name="upload" class="mb-4 mt-3 btn btn-warning button" id="brandUpload">Upload</button>
		</div>
	</form>
</div>
<script type="text/javascript">

function setUpdate(button){
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('update', 'Brand'); ?>");
}

function setDelete(button) {
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('delete', 'Brand'); ?>");
}

$(document).ready(function(){
	$("#brandUpload").click(function(){
		object.setUrl('<?php echo $this->getUrl()->getUrl("upload", "Brand"); ?>');
		var fd = new FormData();
		var files = $('.file')[0].files;

		
		if(files.length > 0 )
		{
			fd.append('file',files[0]);

			$.ajax({
				url: object.getUrl(),
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){
					$.each(response.element, function (i, element) {
						$(element.selector).html(element.html);
						
					});
				},
			});
		}
		else
		{
			alert("Please select a file.");
		}
	});
});
</script>