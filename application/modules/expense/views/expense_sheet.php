<div class="row">
	<div class="panel panel-defalult">
		 <div class="panel-heading">
           <div class="panel-title text-center">
                   <h4 class="expensesheettitle"><?php echo  display('cash_in_hand').' '.display('balance');?> = <?php echo  $cash;?> | <?php echo  display('bank').' '.display('balance');?> = <?php echo  $balance;?> </h4>   
             </div>
                </div>
		<div class="panel-body">
			 <?php echo  form_open('expense/expense/expensesheet_add') ?>
			<table id="expensfield" border="0">
        <tr class="expensincoemtblhead">
            <td><?php echo display('date') ?> <i class="text-danger">*</i></td>
            <td><?php echo display('particular') ?> <i class="text-danger">*</i></td>
            <td><?php echo display('voucher_no') ?> <i class="text-danger">*</i></td>
            <td><?php echo display('amount') ?> <i class="text-danger">*</i></td>
            <td><?php echo display('payment_type') ?> <i class="text-danger">*</i></td>
            <td><?php echo display('head_name') ?></td>
            <td><?php echo display('remark') ?></td>
            <td><?php echo display('action') ?>?</td>
        </tr>
        <tbody id="paymentbody">
        	<?php $sl = 1;
        	 foreach($item_list as $items){?>
        <tr>
           <td class="expenseincometd"><input  type="text" class="form-control datepicker" id="" name="date[]" value="<?php echo date('Y-m-d')?>" /></td>
            <td class="expenseincomesndtd"><input  type="text" class="form-control" id="particular_<?php echo $sl;?>" value="<?php echo  $items['expense_name'];?>" readonly name="particular[]" /></td>
            <td class="expenseincomesndtd"><input  type="text" class="form-control" id="voucher_no_<?php echo $sl;?>" value="" name="voucher_no[]" /></td> 
            <td class="expenseincomesndtd"><input  type="text" class="form-control" id="amount_<?php echo $sl;?>" name="amount[]"  onInput="checkrequired(<?php echo $sl;?>)" onkeyup="formatcheck(this)" /></td>
             <td class="expenseincometd">
            <select name="parent_type[]" class="form-control" onchange="paymentypeselectExpns(<?php echo $sl;?>)" id="paytype_<?php echo $sl;?>">
                 <option value=""><?php echo display('select_type')?></option>
                          <?php foreach($paytype as $ptypes){?>
                          <option value="<?php echo $ptypes->HeadName?>"><?php echo $ptypes->HeadName?></option>
                           <?php }?>
                         </select></td>
            <td class="expenseincometd">
            	<select name="headcode[]" class="form-control" id="headcode_<?php echo $sl;?>">
                 <option></option>
                         </select></td>
             <td class="expenseincomesndtd"><input  type="text" class="form-control" id="remarks" name="remarks[]" /></td>
            <td class="expenseincomesndtd"></td>
            
        </tr>
        <?php $sl++;}?>
    </tbody>
   
        </table>
       
		</div>
		  <div class="form-group text-center">
		  	<input type="hidden" id="baseUrl" value="<?php echo base_url();?>" name="">
		  	  <button type="button" class="btn btn-info w-md m-b-5" onClick="addpaymentfieldExpense('paymentbody');"><?php echo display('add_more') ?></button>
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                        </div>

		<input type="hidden" name="" id="paytypelist" value='<?php foreach($paytype as $ptypes){?>
<option value="<?php echo $ptypes->HeadName?>"><?php echo $ptypes->HeadName?></option><?php }?>'>
	</div>

</div>
<script src="<?php echo base_url('assets/js/incomeexpense.js') ?>" type="text/javascript"></script>