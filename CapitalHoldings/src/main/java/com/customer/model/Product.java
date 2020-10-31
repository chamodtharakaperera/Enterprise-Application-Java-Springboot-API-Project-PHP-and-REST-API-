package com.customer.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import javax.persistence.Table;

@Entity
@Table(name="product")

public class Product
{
	public Product() 
	{
		
	}
	
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;
	
	@Column(name="ProductName")
	private String ProductName;
		
	@Column(name="UnitPrice")
	private double UnitPrice;
	
	
	@Column(name="QtyInHand")
	private int QtyInHand;


	public Long getId() 
	{
		return id;
	}


	public void setId(Long id)
	{
		this.id = id;
	}


	public String getProductName()
	{
		return ProductName;
	}


	public void setProductName(String productName) 
	{
		ProductName = productName;
	}

	public double getUnitPrice() 
	{
		return UnitPrice;
	}


	public void setUnitPrice(double unitPrice) 
	{
		UnitPrice = unitPrice;
	}


	public int getQtyInHand() {
		return QtyInHand;
	}


	public void setQtyInHand(int qtyInHand) 
	{
		QtyInHand = qtyInHand;
	}
	
}
