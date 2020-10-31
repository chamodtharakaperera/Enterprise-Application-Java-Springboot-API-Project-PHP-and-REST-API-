package com.customer.repository;


import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.stereotype.Service;

import com.customer.model.Product;

@Service

public class ProductService 
{

	@Autowired
	private ProductRepository repository;
	public java.util.List<Product> getAllProduct()
	{
		
		java.util.List <Product> productList = repository.findAll();
		
		if(productList.size()>0)
		{	
			return productList;
		}
		else 
		{	return new ArrayList<Product>();}
		
	}
	public Product createOrUpdateProduct(Product entity)
	{
		
		return repository.save(entity);
	}
	public long totalProducts( )
	{
				
		return repository.count(); 
	}
	public void deleteProduct(Long id)
	{
		
		repository.delete(id);
	}
	public void deleteAll()
	{
		
		repository.deleteAll();
	}
	public List<Product> findByProName (String name)
	{
		
		
		return repository.findByProName(name);
	}

	public List<Product> findProLessQty (int less)
	{
		
		return repository.findProLessQty(less);
	}
}
