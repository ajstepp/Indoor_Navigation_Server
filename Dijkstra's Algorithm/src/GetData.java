import javax.sound.sampled.Line;
import java.io.*;
import java.util.List;

public class GetData {
    public static int linenum = 0;
    @SuppressWarnings("null")
    public GetData(String pathname, List<Line> lines) throws IOException {
        //读文件准备
        File file = new File(pathname);
        InputStreamReader rdr = new InputStreamReader(new FileInputStream(file));
        BufferedReader br = new BufferedReader(rdr);
        try {
            String content=null;
            while((content=br.readLine())!=null) {
                linenum++;
                Line newline = new Line();
                List<String> line = new ArrayList<String>();
                String[] station_single = content.split(" ");
                String linename = station_single[0];//第一个元素为线路名
                for(int i=1;i<station_single.length;i++) {//存储各个站点
                    if(i==station_single.length-1 && station_single[i].equals(station_single[1]))//处理环线
                        continue;
                    line.add(station_single[i]);
                }
                newline.setName(linename);
                newline.setStations(line);
                lines.add(newline);
            }
            br.close();
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            if (br == null)
                try {
                    br.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
        }
    }
}
