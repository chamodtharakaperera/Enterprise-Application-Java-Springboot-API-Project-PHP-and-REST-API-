package com.customer.repository;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.customer.model.SpareParts;

import java.util.ArrayList;
import java.util.List;

import javax.websocket.server.PathParam;


/**
 * @author ACER
 *
 */
@Service
public class SparePartsServices {
	
	@Autowired
	private SparePartsRepository repository;
	
	
	public List<SpareParts> getAllSparePart()
	{
		List<SpareParts> SPList=repository.findAll();
		if(SPList.size()>0)
		{
			return SPList;
		}
		else
		{
			return new ArrayList<SpareParts>();
		}
	}
	public SpareParts createOrUpdateSPItems(SpareParts sp)
	{
		
		return repository.save(sp);
	}
	public long totalSPItems( )
	{
				
		return repository.count(); 
	}
	public void deleteSPItems(Long SPItemCode)
	{
		repository.delete(SPItemCode);
	}
	public void deleteAllSP()
	{
		
		repository.deleteAll();
	}
	public String UpdateSPItems(SpareParts sp)
	{   
		if(sp.getSpItemCode()!=null)
		{
			repository.save(sp);
			return "data updated";
		}
		else
		{
			return"can't update";
		}
		
	}
	

}
