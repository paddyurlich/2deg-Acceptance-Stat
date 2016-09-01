<?php
	if(isset($_POST["submit"]))
	{  
	    if($_FILES['file']['name'])  
	    {  
	         $filename = explode('.',$_FILES['file']['name']);  
	         if($filename[1] == 'csv')  
	         {  
	          $sql = "CREATE TABLE ranPU.".$table."(
	                TheDate datetime,
	                Object varchar(16),
	                CellId float(5),
	                NODEBNAME varchar(100),
	                RNC varchar(8),
	                floategrity float,
	                AMR_Call_Setup_Success_Rate_percent float,
	                AMR_Call_Completion_Success_Rate_percent float,
	                PS_Call_Setup_Success_Rate_percent float,
	                PS_Call_Completion_Success_Rate_percent float,
	                VS_HSDPA_RAB_SuccEstab_Rate_percent float,
	                HSDPA_Call_Completion_Success_Rate_percent float,
	                VS_RRC_SuccConnEstab_Cell_Rate_percent float,
	                VS_RRC_Block_Rate_percent float,
	                VS_RRC_FailConnEstab_Cong float,
	                VS_RRC_AttConnEstab_Sum float,
	                VS_RRC_Rej_Code_Cong float,
	                VS_RRC_Rej_ULPower_Cong float,
	                VS_RRC_Rej_DLIUBBand_Cong float,
	                VS_RRC_Rej_Redir_floatraRat float,
	                VS_RRC_Rej_ULCE_Cong float,
	                VS_RRC_Rej_ULIUBBand_Cong float,
	                VS_RRC_Rej_TNL_Fail float,
	                VS_RRC_FailConnEstab_NoReply float,
	                VS_RRC_Rej_Redir_floaterRat float,
	                VS_RRC_Rej_DLCE_Cong float,
	                VS_RRC_Rej_Other_Cong_times float,
	                VS_RRC_Rej_DLPower_Cong float,
	                VS_RRC_Rej_RL_Fail float,
	                VS_RAB_AttEstab_AMR float,
	                VS_RAB_SuccEstabCS_AMR float,
	                VS_RAB_AttEstCS_Conv_64 float,
	                VS_RAB_SuccEstCS_Conv_64 float,
	                VS_RAB_FailEstabCS_PhyChFail float,
	                VS_RAB_FailEstabCS_RBIncCfg float,
	                VS_RAB_FailEstabCS_IubFail float,
	                VS_RAB_FailEstabCS_RBCfgUnsup float,
	                VS_RAB_FailEstabCS_UuNoReply float,
	                VS_RAB_FailEstabCS_DLPower_Cong float,
	                VS_RAB_FailEstabCS_ULCE_Cong float,
	                VS_RAB_FailEstabCS_DLIUBBand_Cong float,
	                VS_RAB_FailEstabCS_ULIUBBand_Cong float,
	                VS_RAB_FailEstabCS_TNL float,
	                VS_RAB_FailEstabCS_DLCE_Cong float,
	                VS_RAB_FailEstabCS_ULPower_Cong float,
	                VS_RAB_FailEstabCS_Code_Cong float,
	                VS_RAB_FailEstabPS_DLCE_Cong float,
	                VS_RAB_FailEstabPS_DLIUBBand_Cong float,
	                VS_RAB_FailEstabPS_DLPower_Cong float,
	                VS_RAB_FailEstabPS_PhyChFail float,
	                VS_RAB_FailEstabPS_IubFail float,
	                VS_RAB_FailEstabPS_RBCfgUnsupp float,
	                VS_RAB_FailEstabPS_RBIncCfg float,
	                VS_RAB_FailEstabPS_TNL float,
	                VS_RAB_FailEstabPS_HSDPAUser_Cong float,
	                VS_RAB_FailEstabPS_HSUPAUser_Cong float,
	                VS_RAB_FailEstabPS_ULCE_Cong float,
	                VS_RAB_FailEstabPS_ULIUBBand_Cong float,
	                VS_RAB_FailEstabPS_ULPower_Cong float,
	                VS_RAB_FailEstabPS_Unsp float,
	                VS_RAB_FailEstabPS_UuNoReply float,
	                VS_RAB_FailEstabPS_Unsp_Other float,
	                VS_RAB_AbnormRel_AMR float,
	                VS_RAB_AbnormRel_CS_OLC float,
	                VS_RAB_AbnormRel_PS_RF float,
	                VS_RAB_AbnormRel_CS_OM float,
	                VS_RAB_AbnormRel_CS_Preempt float,
	                VS_RAB_AbnormRel_PS_Preempt float,
	                VS_RAB_AbnormRel_CS_IuAAL2 float,
	                VS_RAB_AbnormRel_PS_OLC float,
	                VS_RAB_AbnormRel_CS_UTRANgen float,
	                VS_RAB_AbnormRel_PS_OM float,
	                VS_RAB_AbnormRel_PS_GTPULoss float,
	                VS_RAB_AbnormRel_CS_RF float,
	                VS_HSDPA_RAB_AttEstab float,
	                VS_HSDPA_RAB_SuccEstab float,
	                VS_HSDPA_RAB_AbnormRel_RF float,
	                VS_HSDPA_RAB_AbnormRel_DC float,
	                VS_AMR_RB_Erlang_Sum float,
	                VS_HSDPA_MeanChThroughput_kbit_s float,
	                VS_HSDPA_MeanChThroughput_TotalBytes_byte float,
	                VS_LCC_LDR_floaterFreq float,
	                VS_LCC_LDR_floaterRATCS float,
	                VS_LCC_OLC_UL_Num float,
	                VS_LCC_LDR_Num_DLCode float,
	                VS_LCC_OLC_DL_Num float,
	                VS_LCC_LDR_Num_ULCE float,
	                VS_LCC_LDR_floaterRATPS float,
	                VS_LCC_LDR_DL_BERateDown float,
	                VS_LCC_LDR_Num_ULIub float,
	                VS_LCC_LDR_Num_DLIub float,
	                VS_LCC_LDR_Num_DLCE float,
	                VS_LCC_LDR_Num_ULPower float,
	                VS_LCC_LDR_Num_DLPower float,
	                VS_LCC_LDR_UL_BERateDown float,
	                VS_LCC_LDR_CodeAdj_Att float,
	                VS_LCC_HSDPA_CodeAdj_Att float,
	                VS_MaxTCP_dBm float,
	                VS_MaxTCP_NonHS_dBm float,
	                VS_MeanTCP_dBm float,
	                VS_MeanTCP_NonHS_dBm float,
	                VS_MfloatCP_dBm float,
	                VS_MfloatCP_NonHS_dBm float,
	                VS_MaxRTWP_dBm float,
	                VS_MeanRTWP_dBm float,
	                VS_MinRTWP_dBm float,
	                SHO_Factor_percent float,
	                VS_SHO_AS_1RL float,
	                VS_SHO_AS_2RL float,
	                VS_SHO_AS_3RL float,
	                VS_SHO_AMR_Success_Cell_Rate_percent float,
	                VS_SHO_AttRLAdd float,
	                VS_SHO_AttRLDel float,
	                VS_SHO_FailRLAdd_NoReply float,
	                VS_SHO_FailRLAdd_InvCfg float,
	                VS_SHO_FailRLAdd_CfgUnsupp float,
	                VS_SHO_FailRLAdd_ISR float,
	                RRC_AttConnEstab_OrgLwPrSig float,
	                RRC_AttConnEstab_OrgConvCall float,
	                RRC_AttConnEstab_CallReEst float,
	                RRC_AttConnEstab_OrgSubCall float,
	                RRC_AttConnEstab_OrgStrCall float,
	                RRC_AttConnEstab_OrgfloaterCall float,
	                RRC_AttConnEstab_IRATCelRes float,
	                RRC_AttConnEstab_Detach float,
	                RRC_AttConnEstab_OrgBkgCall float,
	                RRC_AttConnEstab_IRATCCO float,
	                RRC_AttConnEstab_OrgHhPrSig float,
	                RRC_AttConnEstab_EmgCall float,
	                RRC_AttConnEstab_Reg float,
	                RRC_AttConnEstab_TmBkgCall float,
	                RRC_AttConnEstab_TmConvCall float,
	                RRC_AttConnEstab_TmHhPrSig float,
	                RRC_AttConnEstab_TmfloaterCall float,
	                RRC_AttConnEstab_TmLwPrSig float,
	                RRC_AttConnEstab_TmStrCall float,
	                RRC_AttConnEstab_Unknown float,
	                RRC_SuccConnEstab_OrgLwPrSig float,
	                RRC_SuccConnEstab_TmLwPrSig float,
	                VS_HSUPA_MeanChThroughput_TotalBytes_byte float,
	                VS_HSDPA_UE_Mean_Cell float,
	                VS_HSUPA_UE_Mean_Cell float,
	                VS_RRC_Paging1_Loss_PCHCong_Cell float,
	                VS_UTRAN_AttPaging1 float,
	                IRATHO_AttOutCS float,
	                VS_IRATHO_AttOutCS_TrigEcNo float,
	                VS_IRATHO_AttOutCS_TrigRscp float,
	                VS_IRATHO_AttOutPS_TrigRscp float,
	                VS_IRATHO_AttOutPS_TrigEcNo float,
	                VS_IRATHO_AttOutPSUE float,
	                VS_HHO_AttfloaterFreqOut float,
	                VS_HHO_SuccfloaterFreqOut float,
	                VS_HSUPA_RAB_AttEstab float,
	                VS_HSUPA_RAB_SuccEstab_Rate_percent float)";
	            if ($connect->query($sql) === TRUE) {
	                echo "Database created successfully";
	            } else {
	                echo "Error creating database: " . $connect->error;
	            }
	            //echo $sql;
	            //=================================================

	              $handle = fopen($_FILES['file']['tmp_name'], "r");  
	              while($data = fgetcsv($handle))  
	              {             
	                $item1 = mysqli_real_escape_string($connect, $data[0]); 
	                $item2 = mysqli_real_escape_string($connect, $data[1]); 
	                $item3 = mysqli_real_escape_string($connect, $data[2]); 
	                $item4 = mysqli_real_escape_string($connect, $data[3]); 
	                $item5 = mysqli_real_escape_string($connect, $data[4]); 
	                $item6 = mysqli_real_escape_string($connect, $data[5]); 
	                $item7 = mysqli_real_escape_string($connect, $data[6]); 
	                $item8 = mysqli_real_escape_string($connect, $data[7]); 
	                $item9 = mysqli_real_escape_string($connect, $data[8]); 
	                $item10 = mysqli_real_escape_string($connect, $data[9]); 
	                $item11 = mysqli_real_escape_string($connect, $data[10]); 
	                $item12 = mysqli_real_escape_string($connect, $data[11]); 
	                $item13 = mysqli_real_escape_string($connect, $data[12]); 
	                $item14 = mysqli_real_escape_string($connect, $data[13]); 
	                $item15 = mysqli_real_escape_string($connect, $data[14]); 
	                $item16 = mysqli_real_escape_string($connect, $data[15]); 
	                $item17 = mysqli_real_escape_string($connect, $data[16]); 
	                $item18 = mysqli_real_escape_string($connect, $data[17]); 
	                $item19 = mysqli_real_escape_string($connect, $data[18]); 
	                $item20 = mysqli_real_escape_string($connect, $data[19]); 
	                $item21 = mysqli_real_escape_string($connect, $data[20]); 
	                $item22 = mysqli_real_escape_string($connect, $data[21]); 
	                $item23 = mysqli_real_escape_string($connect, $data[22]); 
	                $item24 = mysqli_real_escape_string($connect, $data[23]); 
	                $item25 = mysqli_real_escape_string($connect, $data[24]); 
	                $item26 = mysqli_real_escape_string($connect, $data[25]); 
	                $item27 = mysqli_real_escape_string($connect, $data[26]); 
	                $item28 = mysqli_real_escape_string($connect, $data[27]); 
	                $item29 = mysqli_real_escape_string($connect, $data[28]); 
	                $item30 = mysqli_real_escape_string($connect, $data[29]); 
	                $item31 = mysqli_real_escape_string($connect, $data[30]); 
	                $item32 = mysqli_real_escape_string($connect, $data[31]); 
	                $item33 = mysqli_real_escape_string($connect, $data[32]); 
	                $item34 = mysqli_real_escape_string($connect, $data[33]); 
	                $item35 = mysqli_real_escape_string($connect, $data[34]); 
	                $item36 = mysqli_real_escape_string($connect, $data[35]); 
	                $item37 = mysqli_real_escape_string($connect, $data[36]); 
	                $item38 = mysqli_real_escape_string($connect, $data[37]); 
	                $item39 = mysqli_real_escape_string($connect, $data[38]); 
	                $item40 = mysqli_real_escape_string($connect, $data[39]); 
	                $item41 = mysqli_real_escape_string($connect, $data[40]); 
	                $item42 = mysqli_real_escape_string($connect, $data[41]); 
	                $item43 = mysqli_real_escape_string($connect, $data[42]); 
	                $item44 = mysqli_real_escape_string($connect, $data[43]); 
	                $item45 = mysqli_real_escape_string($connect, $data[44]); 
	                $item46 = mysqli_real_escape_string($connect, $data[45]); 
	                $item47 = mysqli_real_escape_string($connect, $data[46]); 
	                $item48 = mysqli_real_escape_string($connect, $data[47]); 
	                $item49 = mysqli_real_escape_string($connect, $data[48]); 
	                $item50 = mysqli_real_escape_string($connect, $data[49]); 
	                $item51 = mysqli_real_escape_string($connect, $data[50]); 
	                $item52 = mysqli_real_escape_string($connect, $data[51]); 
	                $item53 = mysqli_real_escape_string($connect, $data[52]); 
	                $item54 = mysqli_real_escape_string($connect, $data[53]); 
	                $item55 = mysqli_real_escape_string($connect, $data[54]); 
	                $item56 = mysqli_real_escape_string($connect, $data[55]); 
	                $item57 = mysqli_real_escape_string($connect, $data[56]); 
	                $item58 = mysqli_real_escape_string($connect, $data[57]); 
	                $item59 = mysqli_real_escape_string($connect, $data[58]); 
	                $item60 = mysqli_real_escape_string($connect, $data[59]); 
	                $item61 = mysqli_real_escape_string($connect, $data[60]); 
	                $item62 = mysqli_real_escape_string($connect, $data[61]); 
	                $item63 = mysqli_real_escape_string($connect, $data[62]); 
	                $item64 = mysqli_real_escape_string($connect, $data[63]); 
	                $item65 = mysqli_real_escape_string($connect, $data[64]); 
	                $item66 = mysqli_real_escape_string($connect, $data[65]); 
	                $item67 = mysqli_real_escape_string($connect, $data[66]); 
	                $item68 = mysqli_real_escape_string($connect, $data[67]); 
	                $item69 = mysqli_real_escape_string($connect, $data[68]); 
	                $item70 = mysqli_real_escape_string($connect, $data[69]); 
	                $item71 = mysqli_real_escape_string($connect, $data[70]); 
	                $item72 = mysqli_real_escape_string($connect, $data[71]); 
	                $item73 = mysqli_real_escape_string($connect, $data[72]); 
	                $item74 = mysqli_real_escape_string($connect, $data[73]); 
	                $item75 = mysqli_real_escape_string($connect, $data[74]); 
	                $item76 = mysqli_real_escape_string($connect, $data[75]); 
	                $item77 = mysqli_real_escape_string($connect, $data[76]); 
	                $item78 = mysqli_real_escape_string($connect, $data[77]); 
	                $item79 = mysqli_real_escape_string($connect, $data[78]); 
	                $item80 = mysqli_real_escape_string($connect, $data[79]); 
	                $item81 = mysqli_real_escape_string($connect, $data[80]); 
	                $item82 = mysqli_real_escape_string($connect, $data[81]); 
	                $item83 = mysqli_real_escape_string($connect, $data[82]); 
	                $item84 = mysqli_real_escape_string($connect, $data[83]); 
	                $item85 = mysqli_real_escape_string($connect, $data[84]); 
	                $item86 = mysqli_real_escape_string($connect, $data[85]); 
	                $item87 = mysqli_real_escape_string($connect, $data[86]); 
	                $item88 = mysqli_real_escape_string($connect, $data[87]); 
	                $item89 = mysqli_real_escape_string($connect, $data[88]); 
	                $item90 = mysqli_real_escape_string($connect, $data[89]); 
	                $item91 = mysqli_real_escape_string($connect, $data[90]); 
	                $item92 = mysqli_real_escape_string($connect, $data[91]); 
	                $item93 = mysqli_real_escape_string($connect, $data[92]); 
	                $item94 = mysqli_real_escape_string($connect, $data[93]); 
	                $item95 = mysqli_real_escape_string($connect, $data[94]); 
	                $item96 = mysqli_real_escape_string($connect, $data[95]); 
	                $item97 = mysqli_real_escape_string($connect, $data[96]); 
	                $item98 = mysqli_real_escape_string($connect, $data[97]); 
	                $item99 = mysqli_real_escape_string($connect, $data[98]); 
	                $item100 = mysqli_real_escape_string($connect, $data[99]); 
	                $item101 = mysqli_real_escape_string($connect, $data[100]); 
	                $item102 = mysqli_real_escape_string($connect, $data[101]); 
	                $item103 = mysqli_real_escape_string($connect, $data[102]); 
	                $item104 = mysqli_real_escape_string($connect, $data[103]); 
	                $item105 = mysqli_real_escape_string($connect, $data[104]); 
	                $item106 = mysqli_real_escape_string($connect, $data[105]); 
	                $item107 = mysqli_real_escape_string($connect, $data[106]); 
	                $item108 = mysqli_real_escape_string($connect, $data[107]); 
	                $item109 = mysqli_real_escape_string($connect, $data[108]); 
	                $item110 = mysqli_real_escape_string($connect, $data[109]); 
	                $item111 = mysqli_real_escape_string($connect, $data[110]); 
	                $item112 = mysqli_real_escape_string($connect, $data[111]); 
	                $item113 = mysqli_real_escape_string($connect, $data[112]); 
	                $item114 = mysqli_real_escape_string($connect, $data[113]); 
	                $item115 = mysqli_real_escape_string($connect, $data[114]); 
	                $item116 = mysqli_real_escape_string($connect, $data[115]); 
	                $item117 = mysqli_real_escape_string($connect, $data[116]); 
	                $item118 = mysqli_real_escape_string($connect, $data[117]); 
	                $item119 = mysqli_real_escape_string($connect, $data[118]); 
	                $item120 = mysqli_real_escape_string($connect, $data[119]); 
	                $item121 = mysqli_real_escape_string($connect, $data[120]); 
	                $item122 = mysqli_real_escape_string($connect, $data[121]); 
	                $item123 = mysqli_real_escape_string($connect, $data[122]); 
	                $item124 = mysqli_real_escape_string($connect, $data[123]); 
	                $item125 = mysqli_real_escape_string($connect, $data[124]); 
	                $item126 = mysqli_real_escape_string($connect, $data[125]); 
	                $item127 = mysqli_real_escape_string($connect, $data[126]); 
	                $item128 = mysqli_real_escape_string($connect, $data[127]); 
	                $item129 = mysqli_real_escape_string($connect, $data[128]); 
	                $item130 = mysqli_real_escape_string($connect, $data[129]); 
	                $item131 = mysqli_real_escape_string($connect, $data[130]); 
	                $item132 = mysqli_real_escape_string($connect, $data[131]); 
	                $item133 = mysqli_real_escape_string($connect, $data[132]); 
	                $item134 = mysqli_real_escape_string($connect, $data[133]); 
	                $item135 = mysqli_real_escape_string($connect, $data[134]); 
	                $item136 = mysqli_real_escape_string($connect, $data[135]); 
	                $item137 = mysqli_real_escape_string($connect, $data[136]); 
	                $item138 = mysqli_real_escape_string($connect, $data[137]); 
	                $item139 = mysqli_real_escape_string($connect, $data[138]); 
	                $item140 = mysqli_real_escape_string($connect, $data[139]); 
	                $item141 = mysqli_real_escape_string($connect, $data[140]); 
	                $item142 = mysqli_real_escape_string($connect, $data[141]); 
	                $item143 = mysqli_real_escape_string($connect, $data[142]); 
	                $item144 = mysqli_real_escape_string($connect, $data[143]); 
	                $item145 = mysqli_real_escape_string($connect, $data[144]); 
	                $item146 = mysqli_real_escape_string($connect, $data[145]); 
	                $item147 = mysqli_real_escape_string($connect, $data[146]); 
	                $item148 = mysqli_real_escape_string($connect, $data[147]); 
	                $item149 = mysqli_real_escape_string($connect, $data[148]); 
	                $item150 = mysqli_real_escape_string($connect, $data[149]); 
	                $item150 = mysqli_real_escape_string($connect, $data[149]); 
	                $item151 = mysqli_real_escape_string($connect, $data[150]); 
	                $item152 = mysqli_real_escape_string($connect, $data[151]); 
	                $item153 = mysqli_real_escape_string($connect, $data[152]); 
	                $item154 = mysqli_real_escape_string($connect, $data[153]); 

	                   $sql="INSERT into ranPU.".$table."(
	                      TheDate,
	                      Object,
	                      CellId,
	                      NODEBNAME,
	                      RNC,
	                      floategrity,
	                      AMR_Call_Setup_Success_Rate_percent,
	                      AMR_Call_Completion_Success_Rate_percent,
	                      PS_Call_Setup_Success_Rate_percent,
	                      PS_Call_Completion_Success_Rate_percent,
	                      VS_HSDPA_RAB_SuccEstab_Rate_percent,
	                      HSDPA_Call_Completion_Success_Rate_percent,
	                      VS_RRC_SuccConnEstab_Cell_Rate_percent,
	                      VS_RRC_Block_Rate_percent,
	                      VS_RRC_FailConnEstab_Cong,
	                      VS_RRC_AttConnEstab_Sum,
	                      VS_RRC_Rej_Code_Cong,
	                      VS_RRC_Rej_ULPower_Cong,
	                      VS_RRC_Rej_DLIUBBand_Cong,
	                      VS_RRC_Rej_Redir_floatraRat,
	                      VS_RRC_Rej_ULCE_Cong,
	                      VS_RRC_Rej_ULIUBBand_Cong,
	                      VS_RRC_Rej_TNL_Fail,
	                      VS_RRC_FailConnEstab_NoReply,
	                      VS_RRC_Rej_Redir_floaterRat,
	                      VS_RRC_Rej_DLCE_Cong,
	                      VS_RRC_Rej_Other_Cong_times,
	                      VS_RRC_Rej_DLPower_Cong,
	                      VS_RRC_Rej_RL_Fail,
	                      VS_RAB_AttEstab_AMR,
	                      VS_RAB_SuccEstabCS_AMR,
	                      VS_RAB_AttEstCS_Conv_64,
	                      VS_RAB_SuccEstCS_Conv_64,
	                      VS_RAB_FailEstabCS_PhyChFail,
	                      VS_RAB_FailEstabCS_RBIncCfg,
	                      VS_RAB_FailEstabCS_IubFail,
	                      VS_RAB_FailEstabCS_RBCfgUnsup,
	                      VS_RAB_FailEstabCS_UuNoReply,
	                      VS_RAB_FailEstabCS_DLPower_Cong,
	                      VS_RAB_FailEstabCS_ULCE_Cong,
	                      VS_RAB_FailEstabCS_DLIUBBand_Cong,
	                      VS_RAB_FailEstabCS_ULIUBBand_Cong,
	                      VS_RAB_FailEstabCS_TNL,
	                      VS_RAB_FailEstabCS_DLCE_Cong,
	                      VS_RAB_FailEstabCS_ULPower_Cong,
	                      VS_RAB_FailEstabCS_Code_Cong,
	                      VS_RAB_FailEstabPS_DLCE_Cong,
	                      VS_RAB_FailEstabPS_DLIUBBand_Cong,
	                      VS_RAB_FailEstabPS_DLPower_Cong,
	                      VS_RAB_FailEstabPS_PhyChFail,
	                      VS_RAB_FailEstabPS_IubFail,
	                      VS_RAB_FailEstabPS_RBCfgUnsupp,
	                      VS_RAB_FailEstabPS_RBIncCfg,
	                      VS_RAB_FailEstabPS_TNL,
	                      VS_RAB_FailEstabPS_HSDPAUser_Cong,
	                      VS_RAB_FailEstabPS_HSUPAUser_Cong,
	                      VS_RAB_FailEstabPS_ULCE_Cong,
	                      VS_RAB_FailEstabPS_ULIUBBand_Cong,
	                      VS_RAB_FailEstabPS_ULPower_Cong,
	                      VS_RAB_FailEstabPS_Unsp,
	                      VS_RAB_FailEstabPS_UuNoReply,
	                      VS_RAB_FailEstabPS_Unsp_Other,
	                      VS_RAB_AbnormRel_AMR,
	                      VS_RAB_AbnormRel_CS_OLC,
	                      VS_RAB_AbnormRel_PS_RF,
	                      VS_RAB_AbnormRel_CS_OM,
	                      VS_RAB_AbnormRel_CS_Preempt,
	                      VS_RAB_AbnormRel_PS_Preempt,
	                      VS_RAB_AbnormRel_CS_IuAAL2,
	                      VS_RAB_AbnormRel_PS_OLC,
	                      VS_RAB_AbnormRel_CS_UTRANgen,
	                      VS_RAB_AbnormRel_PS_OM,
	                      VS_RAB_AbnormRel_PS_GTPULoss,
	                      VS_RAB_AbnormRel_CS_RF,
	                      VS_HSDPA_RAB_AttEstab,
	                      VS_HSDPA_RAB_SuccEstab,
	                      VS_HSDPA_RAB_AbnormRel_RF,
	                      VS_HSDPA_RAB_AbnormRel_DC,
	                      VS_AMR_RB_Erlang_Sum,
	                      VS_HSDPA_MeanChThroughput_kbit_s,
	                      VS_HSDPA_MeanChThroughput_TotalBytes_byte,
	                      VS_LCC_LDR_floaterFreq,
	                      VS_LCC_LDR_floaterRATCS,
	                      VS_LCC_OLC_UL_Num,
	                      VS_LCC_LDR_Num_DLCode,
	                      VS_LCC_OLC_DL_Num,
	                      VS_LCC_LDR_Num_ULCE,
	                      VS_LCC_LDR_floaterRATPS,
	                      VS_LCC_LDR_DL_BERateDown,
	                      VS_LCC_LDR_Num_ULIub,
	                      VS_LCC_LDR_Num_DLIub,
	                      VS_LCC_LDR_Num_DLCE,
	                      VS_LCC_LDR_Num_ULPower,
	                      VS_LCC_LDR_Num_DLPower,
	                      VS_LCC_LDR_UL_BERateDown,
	                      VS_LCC_LDR_CodeAdj_Att,
	                      VS_LCC_HSDPA_CodeAdj_Att,
	                      VS_MaxTCP_dBm,
	                      VS_MaxTCP_NonHS_dBm,
	                      VS_MeanTCP_dBm,
	                      VS_MeanTCP_NonHS_dBm,
	                      VS_MfloatCP_dBm,
	                      VS_MfloatCP_NonHS_dBm,
	                      VS_MaxRTWP_dBm,
	                      VS_MeanRTWP_dBm,
	                      VS_MinRTWP_dBm,
	                      SHO_Factor_percent,
	                      VS_SHO_AS_1RL,
	                      VS_SHO_AS_2RL,
	                      VS_SHO_AS_3RL,
	                      VS_SHO_AMR_Success_Cell_Rate_percent,
	                      VS_SHO_AttRLAdd,
	                      VS_SHO_AttRLDel,
	                      VS_SHO_FailRLAdd_NoReply,
	                      VS_SHO_FailRLAdd_InvCfg,
	                      VS_SHO_FailRLAdd_CfgUnsupp,
	                      VS_SHO_FailRLAdd_ISR,
	                      RRC_AttConnEstab_OrgLwPrSig,
	                      RRC_AttConnEstab_OrgConvCall,
	                      RRC_AttConnEstab_CallReEst,
	                      RRC_AttConnEstab_OrgSubCall,
	                      RRC_AttConnEstab_OrgStrCall,
	                      RRC_AttConnEstab_OrgfloaterCall,
	                      RRC_AttConnEstab_IRATCelRes,
	                      RRC_AttConnEstab_Detach,
	                      RRC_AttConnEstab_OrgBkgCall,
	                      RRC_AttConnEstab_IRATCCO,
	                      RRC_AttConnEstab_OrgHhPrSig,
	                      RRC_AttConnEstab_EmgCall,
	                      RRC_AttConnEstab_Reg,
	                      RRC_AttConnEstab_TmBkgCall,
	                      RRC_AttConnEstab_TmConvCall,
	                      RRC_AttConnEstab_TmHhPrSig,
	                      RRC_AttConnEstab_TmfloaterCall,
	                      RRC_AttConnEstab_TmLwPrSig,
	                      RRC_AttConnEstab_TmStrCall,
	                      RRC_AttConnEstab_Unknown,
	                      RRC_SuccConnEstab_OrgLwPrSig,
	                      RRC_SuccConnEstab_TmLwPrSig,
	                      VS_HSUPA_MeanChThroughput_TotalBytes_byte,
	                      VS_HSDPA_UE_Mean_Cell,
	                      VS_HSUPA_UE_Mean_Cell,
	                      VS_RRC_Paging1_Loss_PCHCong_Cell,
	                      VS_UTRAN_AttPaging1,
	                      IRATHO_AttOutCS,
	                      VS_IRATHO_AttOutCS_TrigEcNo,
	                      VS_IRATHO_AttOutCS_TrigRscp,
	                      VS_IRATHO_AttOutPS_TrigRscp,
	                      VS_IRATHO_AttOutPS_TrigEcNo,
	                      VS_IRATHO_AttOutPSUE,
	                      VS_HHO_AttfloaterFreqOut,
	                      VS_HHO_SuccfloaterFreqOut,
	                      VS_HSUPA_RAB_AttEstab,
	                      VS_HSUPA_RAB_SuccEstab_Rate_percent
	                    ) values(
	                            '$item1',
	                            '$item2',
	                            '$item3',
	                            '$item4',
	                            '$item5',
	                            '$item6',
	                            '$item7',
	                            '$item8',
	                            '$item9',
	                            '$item10',
	                            '$item11',
	                            '$item12',
	                            '$item13',
	                            '$item14',
	                            '$item15',
	                            '$item16',
	                            '$item17',
	                            '$item18',
	                            '$item19',
	                            '$item20',
	                            '$item21',
	                            '$item22',
	                            '$item23',
	                            '$item24',
	                            '$item25',
	                            '$item26',
	                            '$item27',
	                            '$item28',
	                            '$item29',
	                            '$item30',
	                            '$item31',
	                            '$item32',
	                            '$item33',
	                            '$item34',
	                            '$item35',
	                            '$item36',
	                            '$item37',
	                            '$item38',
	                            '$item39',
	                            '$item40',
	                            '$item41',
	                            '$item42',
	                            '$item43',
	                            '$item44',
	                            '$item45',
	                            '$item46',
	                            '$item47',
	                            '$item48',
	                            '$item49',
	                            '$item50',
	                            '$item51',
	                            '$item52',
	                            '$item53',
	                            '$item54',
	                            '$item55',
	                            '$item56',
	                            '$item57',
	                            '$item58',
	                            '$item59',
	                            '$item60',
	                            '$item61',
	                            '$item62',
	                            '$item63',
	                            '$item64',
	                            '$item65',
	                            '$item66',
	                            '$item67',
	                            '$item68',
	                            '$item69',
	                            '$item70',
	                            '$item71',
	                            '$item72',
	                            '$item73',
	                            '$item74',
	                            '$item75',
	                            '$item76',
	                            '$item77',
	                            '$item78',
	                            '$item79',
	                            '$item80',
	                            '$item81',
	                            '$item82',
	                            '$item83',
	                            '$item84',
	                            '$item85',
	                            '$item86',
	                            '$item87',
	                            '$item88',
	                            '$item89',
	                            '$item90',
	                            '$item91',
	                            '$item92',
	                            '$item93',
	                            '$item94',
	                            '$item95',
	                            '$item96',
	                            '$item97',
	                            '$item98',
	                            '$item99',
	                            '$item100',
	                            '$item101',
	                            '$item102',
	                            '$item103',
	                            '$item104',
	                            '$item105',
	                            '$item106',
	                            '$item107',
	                            '$item108',
	                            '$item109',
	                            '$item110',
	                            '$item111',
	                            '$item112',
	                            '$item113',
	                            '$item114',
	                            '$item115',
	                            '$item116',
	                            '$item117',
	                            '$item118',
	                            '$item119',
	                            '$item120',
	                            '$item121',
	                            '$item122',
	                            '$item123',
	                            '$item124',
	                            '$item125',
	                            '$item126',
	                            '$item127',
	                            '$item128',
	                            '$item129',
	                            '$item130',
	                            '$item131',
	                            '$item132',
	                            '$item133',
	                            '$item134',
	                            '$item135',
	                            '$item136',
	                            '$item137',
	                            '$item138',
	                            '$item139',
	                            '$item140',
	                            '$item141',
	                            '$item142',
	                            '$item143',
	                            '$item144',
	                            '$item145',
	                            '$item146',
	                            '$item147',
	                            '$item148',
	                            '$item149',
	                            '$item150',
	                            '$item151',
	                            '$item152',
	                            '$item153',
	                            '$item154'
	                            )";  

	                    //echo $sql;
	                   
	                    if (mysqli_query($connect, $sql)){
	                      //printf("%d Row inserted.\n", mysqli_affected_rows($connect));
	                      //print "Import done";
	                    } else {
	                      printf("Error: %s\n", mysqli_sqlstate($connect));
	                    } 
	                    
	              }  
	              fclose($handle);  

	         }  
	    }  
	//}




	      //==========================================
	      //get cell and date list for drop downs
	      //==========================================
	      $sql = "SELECT Object, TheDate, RNC from `ranPU`.`".$table."`";
	                  
	      $result = $connect->query($sql);
	      $result_array = array();
	      $cellList_array = array();

	      if ($result->num_rows > 0) {
	          // output data of each row
	          while($row = $result->fetch_assoc()) {
	              $result_array[]= $row;
	              //echo "Cell: " . $row["Object"]. " - Date: " . $row["TheDate"]. " RNC " . $row["RNC"]. "<br>";
	          }
	      } else {
	          echo "0 results ";
	      }


	       foreach($result_array as $k => $v) {
	           $cellList_array[] =  $result_array[$k]['Object'];
	       }

	       foreach($result_array as $k => $v) {
	           $dateList_array[] =  $result_array[$k]['TheDate'];
	       }
	  }






	//=============================
	// print date and time lists
	//=============================

	// foreach($cellList_array as $k => $v) {
	//      echo "<li>";
	//         echo $cellList_array[$k];
	//     echo "</li>";       
	//  }

	// foreach($dateList_array as $k => $v) {
	//      echo "<li>";
	//         echo $dateList_array[$k];
	//     echo "</li>";       
	//  }





?>