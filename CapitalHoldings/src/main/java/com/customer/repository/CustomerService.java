package com.customer.repository;

import java.util.ArrayList;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


import com.customer.model.Customer;

@Service
public class CustomerService {
	@Autowired
	private CustomerRepository repository;
	public java.util.List<Customer> getAllCustomers()
	{
		
		java.util.List <Customer> customerList=repository.findAll();
		
		if(customerList.size()>0)
		{	
			return customerList;
		}
		else 
		{	return new ArrayList<Customer>();}
		
	}
	public int verifyCustomer(String uname,String pass)
	{
		
		java.util.List <Customer> customerList=repository.findByUsernameAndPassword(uname, pass);
		
		if(customerList.size()>0)
		{	
			return 1;
		}
		else 
		{	return 0;}
		
	}
	public int checkExist(String email,String uname)
	{
		java.util.List <Customer> customerList=repository.findByEmailandUsername(email, uname);
		
		if(customerList.size()>0)
		{	
			return 1;
		}
		else 
		{	return 0;}
		
	}
	public void save(Customer customer)
	{
		repository.save(customer);
			
	}
	public int getCurrentCusId(String usrname)
	{
		return repository.getCurrentCusId(usrname);
	}
}
