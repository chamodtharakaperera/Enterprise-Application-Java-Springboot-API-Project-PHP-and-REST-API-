package com.customer.repository;

import java.util.List;

import org.springframework.data.repository.query.Param;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import org.springframework.stereotype.Repository;

import com.customer.model.Product;

@Repository
public interface ProductRepository extends JpaRepository<Product, Long>
{

	//Search complains by sales representative name
		//Annotation-based named query 
		  @Query(value="select P from Product P where P.ProductName = ?1")	
		  //Query method
		 List<Product> findByProName(@Param("name") String name);	
		  
		  

		  @Query(value="select Q from Product Q where Q.QtyInHand <= ?1")	
		  List<Product>findProLessQty(@Param("less") int less);
}
