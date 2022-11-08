package Interface;
import java.lang.*;
import classes.*;
public interface FacultyOperations
{
	public void setFaculty(Faculty e);
	public void getFaculty(String fid);
	public void insertFaculty(Faculty e);
	public void removeFaculty(Faculty e);
	public void showAllFaculty();
}