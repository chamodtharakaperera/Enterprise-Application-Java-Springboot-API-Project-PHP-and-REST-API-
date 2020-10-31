package com.customer.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="SpareParts")
public class SpareParts {
	
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	
	private Long spItemCode;
	
	@Column(name="spItemName")
	private String spItemName;
	
	@Column(name="spItemDis")
	private String spItemDis;
	
	@Column(name="spItemPrice")
	private double spItemPrice;
	
	@Column(name="spItemQyt")
	private int spItemQyt;

	
	
	public Long getSpItemCode() {
		return spItemCode;
	}
	public void setSpItemCode(Long spItemCode) {
		this.spItemCode = spItemCode;
	}
	public String getSpItemName() {
		return spItemName;
	}
	public void setSpItemName(String spItemName) {
		this.spItemName = spItemName;
	}
	public String getSpItemDis() {
		return spItemDis;
	}
	public void setSpItemDis(String spItemDis) {
		this.spItemDis = spItemDis;
	}
	public double getSpItemPrice() {
		return spItemPrice;
	}
	public void setSpItemPrice(double spItemPrice) {
		this.spItemPrice = spItemPrice;
	}
	public int getSpItemQyt() {
		return spItemQyt;
	}
	public void setSpItemQyt(int spItemQyt) {
		this.spItemQyt = spItemQyt;
	}
	
	

}
