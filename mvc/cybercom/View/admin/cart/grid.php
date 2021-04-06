<?php $customers = $this->getCustomers();?>
<?php $cart = $this->getCart();?>
<?php $items = $this->getCart()->getItems();?>
<?php $customer = $cart->getCustomer();?>
<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="h2 text-center mb-1" >
        <p>Cart Details</p>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" method="POST" class="cartgrid" enctype="multipart/form-data" novalidate>
                <div class="float-right mt-3 mb-2 mr-3">
                    <label for="title">Select Customer</label>
                    <?php if (!$customers): ?>
                        <b>No Customers</b>
                    <?php else: ?>
                        <select name="customer[customerId]" id="">
                            <option value="0">Select Customer</option>
                            <?php foreach ($customers->getData() as $value): ?>
                                <option value="<?php echo $value->customerId; ?>" <?php if ($customer): ?><?php if ($value->customerId == $customer->customerId): ?> selected <?php endif;?> <?php endif;?>><?php echo $value->firstname ?></option>
                            <?php endforeach;?>
                        </select>
                    <?php endif;?>
                    <a onclick="object.setForm('.cartgrid').setUrl('<?php echo $this->getGoUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-outline-info mb-2">Go</a>
                </div>
                <br>
                <tr class="float">
                    <td colspan="3"><a onclick="object.setForm('.cartgrid').setUrl('<?php echo $this->getUpdateCartUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-success">Update Cart</a></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="table table-hover"s>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Id</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Row Total</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Final Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$items): ?>
                                    <tr>
                                        <td colspan="8"><?='<p class=text-center mt-5><strong>No Record Found</strong><p>';?></td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($items->getData() as $item): ?>
                                        <tr>
                                            <td><?php echo $item->cartitemId ?></td>
                                            <td><?php echo $item->productId ?></td>
                                            <td><input type="number" name="quantity[<?php echo $item->cartitemId ?>]" value="<?php echo $item->quantity ?>" min=0></td>
                                            <td><?php echo $item->baseprice ?></td>
                                            <td><?php echo $item->quantity * $item->baseprice ?></td>
                                            <td><?php echo $item->quantity * $item->discount ?></td>
                                            <td><?php echo ($item->quantity * $item->baseprice) - ($item->quantity * $item->discount) ?></td>
                                            <th>
                                                <a onclick="object.setUrl('<?php echo $this->getDeleteUrl($item->cartitemId); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>
                                            </th>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </form>
            <div class="mt-3 mb-3">
                <a onclick="object.setUrl('<?php echo $this->getProcessToPayUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-outline-warning">Process To CheckOut</a>
            </div>
        </div>
    </div>
</div>