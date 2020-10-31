package com.customer.repository;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.stereotype.Service;

import com.customer.model.Complain;

@Service

public class ComplainService {
	@Autowired
	private ComplainRepository repository;
	public java.util.List<Complain> getAllComplain()
	{
		
		java.util.List <Complain> complainList=repository.findAll();
		
		if(complainList.size()>0)
		{	
			return complainList;
		}
		else 
		{	return new ArrayList<Complain>();}
		
	}
	public Complain createOrUpdateComplain(Complain entity)
	{
		
		return repository.save(entity);
	}
	public long totalComplains( )
	{
				
		return repository.count(); 
	}
	public void deleteComplain(Long id)
	{
		
		repository.deleteById(id);
	}
	public void deleteAll()
	{
		
		repository.deleteAll();
	}
	public List<Complain> findByFirstname (String name)
	{
		
		
		return repository.findByFirstname(name);
	}

	public List<Complain> findByStartDateBetween (String from,String to)
	{
		// java.util.Date d= SimpleDateFormat.parse(from);
		return repository.findByStartDateBetween(from,to);
	}
}
