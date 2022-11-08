package classes;
import java.lang.*;
import java.io.*;
import Interface.*;

public class FileReadWriteDemo
{
	private File file;				//to create a File
	private FileWriter writer;		//to write in a file
	private FileReader reader;		//to read from a file
	private BufferedReader bfr;		//to read file content
	
	
	public void writeInFilefors(String s,String ss)
	{
		try
		{
			file = new File("Studentmanagement.txt");		
			file.createNewFile();					
			writer = new FileWriter(file, true);	
			writer.write(s+ss+"\r"+"\n");			
			writer.flush();							
			writer.close();							
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace();
		}
	}
	public void writeInFileforf(String s,String ss)
	{
		try
		{
			file = new File("Facultymanagement.txt");		
			file.createNewFile();					
			writer = new FileWriter(file, true);	
			writer.write(s+ss+"\r"+"\n");			
			writer.flush();							
			writer.close();							
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace();
		}
	}
	public void writeInFile(String s,String ss)
	{
		
		try
		{
			file = new File("CourseTransactions.txt");		
			file.createNewFile();					
			writer = new FileWriter(file, true);	
			writer.write(s+ss+"\r"+"\n");			
			writer.flush();							
			writer.close();							
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace();
		}
	}
	
	public void readFromFile()
	{
		try
		{
			reader = new FileReader(file);			
			bfr = new BufferedReader(reader);		
			String text="", temp;					
			
			while((temp=bfr.readLine())!=null)		
			{
				text=text+temp+"\n"+"\r";			
			}
			
			System.out.print(text);   				
			reader.close();							
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace();
		}
	}
	
}