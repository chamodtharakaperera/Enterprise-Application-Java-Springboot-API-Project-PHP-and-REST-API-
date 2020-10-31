package com.customer.controller;

import java.util.List;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.customer.model.Complain;
import com.customer.model.SpareParts;
import com.customer.repository.SparePartsServices;

@RestController
@RequestMapping(path="/spareParts")
public class SparePartsController {
	
	@Autowired
	private SparePartsServices sparePartsServices;
	
	//Retrieve data
	@GetMapping(path="/",produces="application/json")
	public List<SpareParts> getSpareParts()
	{
		return sparePartsServices.getAllSparePart();
	}
	//save
	@PostMapping(path="/",consumes="application/json",produces="application/json")
	public String addSpareParts(@RequestBody SpareParts sp)
	{					
		 Integer SPItemCode = sparePartsServices.getAllSparePart().size()+1;
		 sp.setSpItemCode(new Long(SPItemCode));
		 sparePartsServices.createOrUpdateSPItems(sp);		
		 return "data daved";
	}
	
	@PutMapping(path="/",consumes="application/json",produces="application/json")
	public String UpdateSPItems(@RequestBody SpareParts sp)
	{	
		return sparePartsServices.UpdateSPItems(sp);
	}
	
	@DeleteMapping(path="/",consumes="application/json",produces="application/json")
	public String deleteSPItems(@PathParam("SPItemCode")Long SPItemCode)
	{
		sparePartsServices.deleteSPItems(SPItemCode);
		return "deleted";
	}
	
	@DeleteMapping(path="/deleteAll",consumes="application/json",produces="application/json")
	public void deleteAllSP()
	{
		sparePartsServices.deleteAllSP();
		
		
	}
	
	
	
}
