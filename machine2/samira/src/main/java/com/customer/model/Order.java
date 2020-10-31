package com.customer.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;
@Entity
@Table(name="Orders")
public class Order
{
	
	@Id
	@GeneratedValue
	private Long id;
	
	
	@Column(name="proderDate")
	private String proderDate;
	
	
	@Column(name="cusName")
	private String cusName;
	
	
	@Column(name="cusAdd")
	private String cusAdd;
	
	
	@Column(name="cusTel")
	private String cusTel;


	public Order() {
		
		// TODO Auto-generated constructor stub
	}



	public long getId() {
		return id;
	}


	public void setId(Long id) {
		this.id = id;
	}


	public String getCusAdd() {
		return cusAdd;
	}


	public void setCusAdd(String cusAdd) {
		this.cusAdd = cusAdd;
	}


	
	public String getProderDate() {
		return proderDate;
	}


	public void setProderDate(String proderDate) {
		this.proderDate = proderDate;
	}


	public String getCusName() {
		return cusName;
	}


	public void setCusName(String cusName) {
		this.cusName = cusName;
	}


	

	public String getCusTel() {
		return cusTel;
	}




	public void setCusTel(String cusTel) {
		this.cusTel = cusTel;
	}
	
	


}