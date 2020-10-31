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

import com.customer.model.Product;
import com.customer.repository.ProductService;

@RestController
@RequestMapping(path="/products")
public class ProductController
{
	@Autowired
	private ProductService productService;
	
	//Retrieve data
	@GetMapping(path="/",produces="application/json")
	public List<Product> getProduct()
	{
		return productService.getAllProduct();
		
	}
	//save data
	@PostMapping(path="/",consumes="application/json",produces="application/json")
	public void addProduct(@RequestBody Product product)
	{					
		 Integer id = productService.getAllProduct().size()+1;
		 product.setId(new Long(id));
		 productService.createOrUpdateProduct(product);						
	}
	//update products by id
	@PutMapping(path="/",consumes="application/json",produces="application/json")
	public Product updateProduct(@PathParam("id")Long id, Product product)
	{
		product.setId(id);
		
		return productService.createOrUpdateProduct(product);
	}
	//Delete products by id
	@DeleteMapping(path="/",consumes="application/json",produces="application/json")
	public String deleteProduct(@PathParam("id")Long id, Product product)
	{
		
		productService.deleteProduct(id);
		return "ID no is deleted";
		
	}
	//delete all products
	@DeleteMapping(path="/deleteAll",consumes="application/json",produces="application/json")
	public String deleteAll()
	{
		
		productService.deleteAll();
		return "All products are deleted Successfully";
		
	}
	//get total no of products
	@GetMapping(path="/totalProducts",produces="application/json")
	public String totalProducts()
	{
		return "Total Number of products : "+ String.valueOf(productService.totalProducts());
		
	}
	
	//Find products by name
	@GetMapping(path="/findByProName",produces="application/json")
	public List<Product> findByProName(@PathParam("name")String name)
	{
		
		return productService.findByProName(name);
	}
	
	//Filter products less than a given limit
	@GetMapping(path="/chkQty",produces="application/json")
	public List<Product> findProLessQty(@PathParam("less") int less)
	{
		
		return productService.findProLessQty(less);
	}
	
}
