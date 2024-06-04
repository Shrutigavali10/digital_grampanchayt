<?php include 'admin_header.php'; ?>

	<style type="text/css">

		span
		{
			color: red;
		}

		.info
		{
			background-color: #3385ff;
			padding: 30px;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
             background-image: url(news1.jpg);
             background-size:cover;
             background-image: cover;
		}
		body
		{
			background-color:gray;
		}
		.reg
		{
			background-color: white;
			padding: 30px;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		.container
		{
			margin-top: 10px;
			margin-bottom: 10px;		}
		p
		{
			color: white;
		}
		input[type=submit]
		{
			border-top-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
	</style>
<form action="" method="POST">
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		
		
    <div class="container">
    	<div class="row">
    		
    		<div class="col-sm-12 reg">
    			<h3 style="color:#6432a8">Add News</h3>
    			<br>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Select Type<span>*</span></label>
                       <select id="" name="txt_cat" class="form-control">
                       	<option value="News "></option>
                        <option value="notice ">Notice</option>
                        <option value="">Announcement</option>
                        <option value="audi">Event</option>
                         </select>
                    </div>
                </div>
    			<br>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Date<span>*</span></label>
                        <input type="Date" name="txt_date" class="form-control">
                    </div>
                </div>
                <br>
    			<div class="row">
    				<div class="col-sm-12">
                        <label>Add Name Of News<span>*</span></label>
    					 <input type="text" name="txt_nname" class="form-control" placeholder="Add News" onkeypress="javascript:return isString(event)">
    				</div>
    			</div>
    			<br>
    			<div class="row">
    				<div class="col-sm-12">
    					<label>Add Image<span>*</span></label>
    					 <input type="file" name="txt_nimg" class="form-control" placeholder="Select Image">

    				</div>
    			</div>
    			<br>
    			<div class="row">
    				<div class="col-sm-12">
                        <label>Description<span>*</span></label>
    					<textarea class="form-control" name="txt_ndesc" placeholder="Enter Description"></textarea>
    					
    				</div>
    			</div>
    			<br>
    			
    			<br>
    			<div class="row">
    				<div class="col-sm-12">
    					
    					<input type="submit" name="btnsubmit" value="Submit" style="background-color:#6432a8;color: white" class="form-control">
    				</div>
    				
    			</div>

    		</div>
    	</div>
    </div>

	</div>
	<div class="col-sm-6"></div>

</div>
</form>

<?php include 'admin_footer.php'; ?>