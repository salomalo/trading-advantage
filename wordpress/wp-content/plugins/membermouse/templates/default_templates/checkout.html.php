<?php 
/**
 * 
 * MemberMouse(TM) (http://www.membermouse.com)
 * (c) MemberMouse, LLC. All rights reserved.
 */
?>
<link rel='stylesheet' type='text/css' href='<?php echo $p->resourceDirectory; ?>css/user/mm-checkout.css' />

[MM_Form type='checkout']
<div class="mm-checkoutContainer"> 

[MM_Form_Message type='error']

<div class="mm-checkoutSection">
	<h2>[MM_Form_Data name='productName']</h2>
	<p class="mm-productDesc">[MM_Form_Data name='productDescription']</p>
	<ul>
		<li><span class="mm-title">Product Price:</span> [MM_Form_Data name='productPrice'] </li>
		[MM_Order_Decision isShippable="true"]
		<li><span class="mm-title">Shipping Price:</span> [MM_Form_Data name='shippingPrice'] </li>
		[/MM_Order_Decision]
		<li><span class="mm-title">Discount:</span> [MM_Form_Data name='discount'] </li>
		<li><span class="mm-title">Total Price:</span> [MM_Form_Data name='totalPrice'] </li>
	</ul>
	<div class="mm-purchaseSection">
		[MM_Form_Button type='all' label='Submit Order' color='orange']
	</div>
</div>
	
<div class="mm-checkoutInfo"> 

[MM_Form_Section type='accountInfo']
<div id="mm-account-information-section" class="mm-checkoutInfoBlock">
	<h3>Account Information</h3>
	
	<p class="mm-formField">
		<label>First Name:</label>
		[MM_Form_Field type='input' name='firstName'] 
	</p>
	<p class="mm-formField">
		<label>Last Name:</label>
		[MM_Form_Field type='input' name='lastName'] 
	</p>
	<p class="mm-formField">
		<label>Email:</label>
		[MM_Form_Field type='input' name='email'] 
	</p>
	<p class="mm-formField">
		<label>Password:</label>
		[MM_Form_Field type='input' name='password'] 
	</p>
	<p class="mm-formField">
		<label>Phone:</label>
		[MM_Form_Field type='input' name='phone'] 
	</p>
</div>
[/MM_Form_Section]
		
[MM_Form_Section type='billingInfo']
<div id="mm-billing-information-section" class="mm-checkoutInfoBlock">
	<h3>Billing Details</h3>
	
	<p class="mm-ccLogos"><img src="<?php echo $p->resourceDirectory; ?>images/cclogos.gif" width="199" height="30" alt="Visa, Master Card, American Express, Discover" /></p>
	<p class="mm-formField">
		<label>Credit Card:</label>
		[MM_Form_Field name='ccNumber'] 
	</p>
	<p class="mm-formField">
		<label>Security Code:</label>
		[MM_Form_Field name='ccSecurityCode'] 
	</p>
	<p id="mm-checkout-expiration-date" class="mm-checkout-expiration-date mm-formField">
		<label>Expiration Date: </label>
		[MM_Form_Field name='ccExpirationDate'] 
	</p>
	
	<p style="clear:both;"></p>
	
	<h3>Billing Address</h3>
	
	<p class="mm-formField">
		<label>Address:</label>
		[MM_Form_Field name='billingAddress'] 
	</p>
	<p class="mm-formField">
		<label>City:</label>
		[MM_Form_Field name='billingCity'] 
	</p>
	<p class="mm-formField">
		<label>State:</label>
		[MM_Form_Field name='billingState'] 
	</p>
	<p class="mm-formField">
		<label>Zip:</label>
		[MM_Form_Field name='billingZipCode'] 
	</p>
	<p class="mm-formField">
		<label>Country:</label>
		[MM_Form_Field name='billingCountry'] 
	</p>
</div>
[/MM_Form_Section]
		
[MM_Form_Section type='shippingInfo']
<div id="mm-shipping-information-section" class="mm-checkoutInfoBlock">
	<h3>Shipping Address</h3>
	
	<p id="mm-shipping-method-block" class="mm-formField">
		<label>Shipping Method:</label>
		[MM_Form_Field name='shippingMethod'] 
	</p>
	<p class="mm-formField"> 
		Shipping is the same as billing
		[MM_Form_Field name='shippingSameAsBilling']
	</p>
	
	[MM_Form_Subsection type='shippingAddress']
	<div id="mm-shipping-info-block">
		<p class="mm-formField">
			<label>Address:</label>
			[MM_Form_Field name='shippingAddress'] 
		</p>
		<p class="mm-formField">
			<label>City:</label>
			[MM_Form_Field name='shippingCity'] 
		</p>
		<p class="mm-formField">
			<label>State:</label>
			[MM_Form_Field name='shippingState'] 
		</p>
		<p class="mm-formField">
			<label>Zip :</label>
			[MM_Form_Field name='shippingZipCode'] 
		</p>
		<p class="mm-formField">
			<label>Country:</label>
			[MM_Form_Field name='shippingCountry'] 
		</p>
	</div>
	[/MM_Form_Subsection] 
	
</div>
[/MM_Form_Section]
		
[MM_Form_Section type='coupon']
<div id="mm-coupon-block" class="mm-couponSection mm-checkoutInfoBlock">
	<h3>Coupons</h3>
	
	<p class="mm-formField"> 
		[MM_Form_Field name='couponCode'] 
		<a href="[MM_Form_Button type='applyCoupon']" class="mm-button">Apply Coupon</a>
	</p>
	
	[MM_Form_Message type='couponSuccess']
	[MM_Form_Message type='couponError'] 
</div>
[/MM_Form_Section] 

</div>
</div>
[/MM_Form]