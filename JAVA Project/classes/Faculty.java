package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import Interface.*;

public class Faculty{
	private String name;
	private String fid;
	private double salary;
	
	public void setName(String name){
		this.name=name;
	}
	public void setFId(String fid){
		this.fid=fid;
	}
	public void setSalary(double salary){
		this.salary=salary;
	}
	public String getName(){return name;}
	public String getFId(){return fid;}
	public double getSalary(){return salary;}
	
}