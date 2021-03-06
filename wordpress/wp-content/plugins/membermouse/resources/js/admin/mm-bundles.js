/*!
 * 
 * MemberMouse(TM) (http://www.membermouse.com)
 * (c) MemberMouse, LLC. All rights reserved.
 */
var MM_BundlesViewJS = MM_Core.extend({
	setToExpire: function(){
		if(jQuery("#expiry-setting").is(":checked")){
			jQuery("#expires_div").show();
			jQuery("#should-expire").val("1");
		}
		else{
			jQuery("#should-expire").val("0");
			jQuery("#expires_div").hide();	
		}
	},
  
	processForm: function()
	{
		// status
		jQuery("#mm-status").attr('value', jQuery('#mm-status-container input:radio:checked').val());
 	  
		// subscribtion type
 	    var subTypeSelection = "free";
 	    
 	    if(jQuery("#subscription-type-paid").is(":checked"))
 	    {
 	    	subTypeSelection = "paid";
 	    }
		
		if(subTypeSelection == 'paid')
 	 	{
		  jQuery("#mm-paid-bundle-settings").show();
 	 	}
		else
		{
		  jQuery("#mm-paid-bundle-settings").hide();
		}
 	    
		jQuery("#mm-subscription-type").attr('value', subTypeSelection);
 	  
		if(subTypeSelection == 'paid') 
		{
			jQuery("#mm-products\\[\\]").removeAttr("disabled");
			jQuery("#mm-products\\[\\]").show();
		} else 
		{
			jQuery("#mm-products\\[\\]").attr("disabled","disabled");
			jQuery("#mm-products\\[\\]").hide();
		}
		
	    jQuery("select[id=mm-products\\[\\]] :disabled").each(function()
	    {
	    	jQuery(this).attr("selected","selected");
	    	jQuery(this).removeAttr("disabled");
	     });
	},
	
	checkShortNameAjax: function() {
		var short_name = jQuery("#mm-short-name").val().toUpperCase();
		short_name = short_name.replace(/[^A-Z0-9]/g,'');
		jQuery("#mm-short-name").val(short_name);
		if (short_name != "")
		{
			var values = {};
			values.mm_action = "checkShortNameUnique";
			values.short_name = short_name;
			
			var module = this.module;
		    var method = "performAction";
		    var action = 'module-handle';
		    
		    var ajax = new MM_Ajax(false, module, action, method);
		    ajax.send(values, false, 'mmjs','updateShortNameUniqueStatus');	
		}
	},
	
	updateShortNameUniqueStatus: function(isUnique)
	{
		if (isUnique)
		{
			jQuery("#mm-short-name-unique-status").hide();
			jQuery("#mm-short-name-unique-status").html("Short Name is ok");
			jQuery("#mm-short-name-unique-status").css('color','#00FF00');
		}
		else
		{		
			jQuery("#mm-short-name-unique-status").show();
			jQuery("#mm-short-name-unique-status").html("Short Name is not unique");
			jQuery("#mm-short-name-unique-status").css('color','#FF0000');
		}
	},
   
	validateForm: function()
	{
		// display name 
		if(jQuery('#mm-display-name').val() == "") {
			alert("Please enter a bundle name");
			return false;
		}
	   
		// subscription type
		if(jQuery("#mm-subscription-type").val() == "paid" && (jQuery("#mm-products\\[\\]").val() == null || jQuery("#mm-products\\[\\]").val() == "")) 
		{
			alert("Please select one or more products or set the bundle type to Free");
			return false;
		}
		
		var autogen_shortname = (jQuery('#autogen_shortname').val() == "true");

		//short name
		if(!autogen_shortname && (jQuery('#mm-short-name').val() == "")){
			alert("Please enter a short name");
			return false;
		}
	   
		return true;
	},
	
	  showPurchaseLinks: function(accessTypeId, accessTypeName, productIds)
	  {	
			var values =  {};
			values.access_type_id = accessTypeId;
			values.access_type_name = accessTypeName;
			values.product_ids = productIds;
			values.mm_action = "showPurchaseLinks";
			
			mmdialog_js.showDialog("mm-purchaselinks-dialog", this.module, 480, 350, "Purchase Links", values);
	  },
		
	  productChangeHandler: function()
	  {	
		  $lastProductId = jQuery("#mm-last-selected-product-id").val();
		  $productId = jQuery("#mm-product-selector").val();
		  
		  if($lastProductId != 0)
		  {
			  jQuery("#mm-purchaselinks-"+$lastProductId).hide(); 
		  }
		  
		  if($productId != 0)
		  {
			  jQuery("#mm-purchaselinks-"+$productId).show(); 
		  }
		  
		  jQuery("#mm-last-selected-product-id").val($productId);
	  },
});

var mmjs = new MM_BundlesViewJS("MM_BundlesView", "Bundle");