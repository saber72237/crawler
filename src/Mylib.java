
  
import java.util.ArrayList;  
import java.util.List;  

import org.apache.http.HttpEntity;  
import org.apache.http.HttpResponse;  
import org.apache.http.NameValuePair;  
import org.apache.http.client.HttpClient;  
import org.apache.http.client.config.RequestConfig;  
import org.apache.http.client.entity.UrlEncodedFormEntity;  
import org.apache.http.client.methods.HttpPost;  
import org.apache.http.impl.client.HttpClientBuilder;
//import org.apache.http.impl.client.HttpClients;
//import org.apache.http.client.methods.HttpPost;
import org.apache.http.message.BasicNameValuePair;  
import org.apache.http.util.EntityUtils;  
 
public class Mylib{
 
	private static final String URL = "http://lib.hpu.edu.cn/";//���ʵĵ�½��ַ
 
	/** 
	 * ��½��ϵͳ 
	 * @author lgz
	 * @param input_username �û���
	 * @param input_password ����
	 * @return �ɹ�����true ʧ�ܷ���false
	 *  
	 */  
	public static void main(String[] args) throws Exception{  
 
		List<NameValuePair> nvps = new ArrayList<NameValuePair>();
		nvps.add(new BasicNameValuePair("DropDownList1", "1")); 
		nvps.add(new BasicNameValuePair("ImageButton1.y", "0"));
		nvps.add(new BasicNameValuePair("ImageButton1.x", "0"));
		nvps.add(new BasicNameValuePair("__VIEWSTATEGENERATOR", "C2EE9ABB"));
		nvps.add(new BasicNameValuePair("__VIEWSTATE", "SsMZjJHQUgDUP5zEHtWbFYoNjst7QHctE00phAeVThl0Po90VSgY2jWrPNi5yx85/9wp10HMlTSrzXIJoGlsFNRY1eSCaFbvT/yR+cPcHkHbFq5VZtRhNXac+bW0jAGcuW+bLOyikcq6xCr7AzuXfi5SqpvtyB7cOfczXsZsgWl59U7CXy+50fZ80zT8aZ+2WIXiRe4W+8ecsBBSoclDXFuqz7OURfvkj/JDka8xa33n2PV2"));
		nvps.add(new BasicNameValuePair("__EVENTVALIDATION", "w1Z7zDFzVbEAqeEJrOqb6HUxG7QfoyHq9lnQxNFui+OEvIR2soxmldRTUR+oT5jlaS7cXkYtC1Jg0dhjSDugs0boIgOf1hYAgEqbUfKN2sTGOLuyBZPhlLl5GRBczk81BE7FuyQMJS7kr7hjHiFOdLmfmEZbzfi8F7wR6KsEaquQOXmb"));
		nvps.add(new BasicNameValuePair("TextBox1", "311722000408"));
		nvps.add(new BasicNameValuePair("TextBox2", "saber5459"));
		HttpEntity reqEntity = new UrlEncodedFormEntity(nvps, "utf-8");
		
		RequestConfig requestConfig = RequestConfig.custom()  
		        .setConnectTimeout(5000)//һ�����ӳ�ʱ��connectionTimeout-->ָ��������һ��url�����ӵȴ�ʱ��  
		                .setSocketTimeout(5000)// ������ȡ���ݳ�ʱ��SocketTimeout-->ָ����������һ��url����ȡresponse�ķ��صȴ�ʱ��  
		                .setConnectionRequestTimeout(5000)  
		                .build();  
		
		HttpClient httpclient = HttpClientBuilder.create().build();
		HttpPost post = new HttpPost("http://218.196.244.90:8080/login.aspx");
		post.setEntity(reqEntity); 
		post.setConfig(requestConfig);
		HttpResponse response = httpclient.execute(post); 
			
			if(response.getStatusLine().getStatusCode() == 200){  
				HttpEntity resEntity = response.getEntity();  
	            String message = EntityUtils.toString(resEntity, "utf-8");  
	            System.out.println(message);  
	            System.out.println("ture"); 
			}else{  
				System.out.println(false);   
	        }

	}
 
	}
 

